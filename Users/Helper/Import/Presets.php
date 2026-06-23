<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Import;

use Numbers\Backend\Db\Common\Model\Models;
use Numbers\Tenants\Tenants\Model\Modules;
use Numbers\Users\Users\Model\Import\Imported;

class Presets
{
    public static function seeAvailableImports(& $form): string
    {
        $flag_rerun_label_already = false;
        rerun_label:
                $imports = \Numbers\Users\Users\Model\Import\Presets::queryBuilderStatic(['alias' => 'a'])
                    ->select()
                    ->columns([
                        'a.*',
                        'b.*',
                        'c.*',
                        'd.*',
                        'import_details' => 'e.um_impimported_import_details',
                    ])
                    ->join('INNER', new Models(), 'b', 'ON', [
                        ['AND', ['a.um_imppreset_sm_model_id', '=', 'b.sm_model_id', true]]
                    ])
                    ->join('LEFT', function (& $query) {
                        $query = Imported::queryBuilderStatic(['alias' => 'inner_c'])->select();
                        $query->columns([
                            'inner_c.um_impimported_um_imppreset_id',
                            'import_num' => 'COUNT(*)',
                            'import_last' => 'MAX(inner_c.um_impimported_inserted_timestamp)',
                            'last_um_impimported_id' => 'MAX(um_impimported_id)',
                        ]);
                        $query->where('AND', ['inner_c.um_impimported_tenant_id', '=', \Tenant::id()]);
                        $query->groupby(['inner_c.um_impimported_um_imppreset_id']);
                    }, 'c', 'ON', [
                        ['AND', ['a.um_imppreset_id', '=', 'c.um_impimported_um_imppreset_id', true], false]
                    ])
                    ->join('LEFT', function (& $query) {
                        $query = Modules::queryBuilderStatic(['alias' => 'inner_d'])->select();
                        $query->columns([
                            'inner_d.tm_module_module_code',
                            'all_modules' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_d.tm_module_id)", 'delimiter' => ';;']),
                            'module_id_min' => 'MIN(inner_d.tm_module_id)',
                        ]);
                        $query->where('AND', ['inner_d.tm_module_tenant_id', '=', \Tenant::id()]);
                        $query->groupby(['inner_d.tm_module_module_code']);
                    }, 'd', 'ON', [
                        ['AND', ['a.um_imppreset_module_code', '=', 'd.tm_module_module_code', true], false]
                    ])
                    ->join('LEFT', new Imported(), 'e', 'ON', [
                        ['AND', ['c.last_um_impimported_id', '=', 'e.um_impimported_id', true]]
                    ])
                    ->where('AND', ['um_imppreset_sm_model_code', '=', '\\' . $form->import_object->collection_object->primary_model::class])
                    ->query('um_imppreset_id');
        // see if we have to import from #
        $import_with_preset_id = (int) \Request::input('import_with_preset_id') ?? 0;
        if (!$flag_rerun_label_already && $import_with_preset_id != 0 && in_array($import_with_preset_id, array_keys($imports['rows']))) {
            $imported_result = \Factory::callMethod($imports['rows'][$import_with_preset_id]['um_imppreset_activation_method'] . '::process', true);
            if ($imported_result['success']) {
                $imported_result = Imported::collectionStatic()->merge([
                    'um_impimported_tenant_id' => \Tenant::id(),
                    'um_impimported_name' => $imports['rows'][$import_with_preset_id]['um_imppreset_name'],
                    'um_impimported_um_imppreset_id' => $import_with_preset_id,
                    'um_impimported_module_id' => $imports['rows'][$import_with_preset_id]['module_id_min'], // todo handle multi module
                    'um_impimported_sm_model_id' => $imports['rows'][$import_with_preset_id]['um_imppreset_sm_model_id'],
                    'um_impimported_sm_model_code' => $imports['rows'][$import_with_preset_id]['um_imppreset_sm_model_code'],
                    'um_impimported_import_details' => 'Imported rows ' . $imported_result['count'],
                    'um_impimported_inactive' => 0,
                ]);
            }
            if (!$imported_result['success']) {
                $form->error(DANGER, $imported_result['error']);
            } else {
                $form->error(SUCCESS, loc('NF.Form.SuccessfullyImportedData', 'Successfully imported data!'));
                $flag_rerun_label_already = true;
                goto rerun_label;
            }
        }
        // assemble table
        $result = '';
        $result .= '<hr/>';
        $result .= '<h4>' . loc('NF.Form.ImportPresets', 'Import Presets') . ':</h4>';
        $result .= '<table class="table table-striped">';
        $result .= '<tr>';
        $result .= '<th>#</th>';
        $result .= '<th>' . loc('NF.Form.Name', 'Name') . '</th>';
        $result .= '<th>' . loc('NF.Form.Model', 'Model') . '</th>';
        $result .= '<th>' . loc('NF.Form.NumOfImports', '# of Imports') . '</th>';
        $result .= '<th>' . loc('NF.Form.LastImport', 'Last Import') . '</th>';
        $result .= '<th>' . loc('NF.Form.Actions', 'Actions') . '</th>';
        $result .= '</tr>';
        foreach ($imports['rows'] as $v) {
            $result .= '<tr>';
            $result .= '<td>' . $v['um_imppreset_id'] . '</td>';
            $result .= '<td>' . $v['um_imppreset_name'] . '</td>';
            $result .= '<td>' . $v['sm_model_name'] . '</td>';
            $result .= '<td>' . ($v['import_num'] ?? 0) . '</td>';
            $result .= '<td>' . ($v['import_last'] ? \Format::date($v['import_last']) : null) . ($v['import_details'] ? ('<br/>' . $v['import_details']) : '') . '</td>';
            $result .= '<td>';
            $result .= \HTML::a(['href' => '?import_with_preset_id=' . $v['um_imppreset_id'], 'value' => $v['import_num'] ? loc('NF.Form.Reimport', 'Reimport') : loc('NF.Form.Import', 'Import')]);
            $result .= '</td>';
            $result .= '</tr>';
        }
        $result .= '</table>';
        return $result;
    }
}
