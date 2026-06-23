<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\ACL\Menu;

use Numbers\Users\Users\DataSource\ACL\Menu;

class Permissions
{
    /**
     * Get
     *
     * @param array $options
     * @return array
     */
    public function get(array $options = []): array
    {
        $datasource = new Menu();
        $data = $datasource->get();
        $result = [
            'all_items' => [],
            'quick_actions' => [],
            'footer_items' => [],
        ];
        $roots = [];
        $always_show = \Application::get('flag.numbers.frontend.menu.always_show');
        $menu_id = 1;
        // first loop to get all menu group name items
        $menu_group_names = [];
        foreach ($data as $k => $v) {
            if ($v['type'] === 295) {
                $name_loc = 'NF.System.' . (new \String2($v['name'])->englishOnly()->toString());
                $menu_group_names[$v['name']] = [
                    'name' => htmlspecialchars($v['name']),
                    'name_loc' => htmlspecialchars(loc($name_loc, $v['name'])),
                    'icon' => $v['icon'],
                ];
            }
        }
        // second loop
        foreach ($data as $k => $v) {
            // for menu group items
            if ($v['type'] == 295) {
                continue;
            }
            // handle permission
            if ($v['type'] !== 299) {
                // see if module has been activated
                if (!\Can::systemModuleExists($v['module_code'])) {
                    continue;
                }
                // if we have permission
                if (!empty($v['acl_permission'])) {
                    if (!\Application::$controller->canExtended($v['acl_resource_id'], $v['acl_method_code'], $v['acl_action_id'], null, ['skip_authorized_and_public_checks' => true])) {
                        if (!$always_show) {
                            continue;
                        } else {
                            $v['name'] .= ' (Hidden)';
                        }
                    }
                } else { // public & authorized
                    if (\User::authorized()) {
                        // menu items with resources
                        if (!empty($v['acl_resource_id'])) {
                            if (!\Application::$controller->canExtended($v['acl_resource_id'], $v['acl_method_code'], $v['acl_action_id'], null, ['skip_authorized_and_public_checks' => true])) {
                                continue;
                            }
                        }
                        if (empty($v['acl_authorized'])) {
                            continue;
                        }
                    } else {
                        if (empty($v['acl_public'])) {
                            continue;
                        }
                    }
                }
            }
            $menu_group_name = [];
            if ($v['root'] && !empty($v['menu_group_name']) && isset($menu_group_names[$v['menu_group_name']])) {
                $menu_group_name[$v['menu_group_name']] = $menu_group_names[$v['menu_group_name']];
            }
            // add item to the list
            $key = [$v['type']];
            for ($i = 1; $i <= 9; $i++) {
                if (empty($v['group' . $i])) {
                    break;
                }
                $key[] = $v['group' . $i];
                // check if group exists
                $existing = array_key_get($result, $key);
                if (empty($existing)) {
                    // grab icon & title
                    $group = [];
                    if ($v['type'] !== 299) {
                        $key2 = $key;
                        array_shift($key2);
                        array_unshift($key2, 299);
                        $group = array_key_get($result, $key2);
                        if (!empty($group)) {
                            $group['options'] = [];
                        }
                    }
                    if (empty($group)) {
                        $name_loc = 'NF.System.' . (new \String2($v['group' . $i])->englishOnly()->toString());
                        $fixed_url = $v['url'];
                        if (!empty($v['url']) && $v['url'][0] == '/' && !empty($v['template'])) {
                            $fixed_url = \Request::fixUrl($v['url'], $v['template']);
                        }
                        $group = [
                            'name' => htmlspecialchars($v['group' . $i]),
                            'name_loc' => htmlspecialchars(loc($name_loc, $v['group' . $i])),
                            'title' => null,
                            'title_loc' => null,
                            'icon' => null,
                            'icon_frontend' => null,
                            'url' => $fixed_url,
                            'child_ordered' => $v['child_ordered'],
                            'order' => $v['order'],
                            'separator' => $v['separator'],
                            'name_generator' => $v['name_generator'],
                            'options_generator' => $v['options_generator'],
                            'options' => [],
                            'menu_id' => $menu_id,
                            'class' => $v['class'] ?? null,
                            'template' => $v['template'] ?? null,
                            'root' => $v['root'],
                        ];
                        $menu_id++;
                    }
                    array_key_set($result, $key, $group);
                    // process roots
                    if (!empty($group['root']) && in_array($key[0], [200, 210])) {
                        $roots[] = $key;
                    }
                }
                $key[] = 'options';
            }
            $key[] = $v['name'];
            // badge has type and value
            $badge = null;
            if (!empty($v['badge'])) {
                $v['badge'] = explode(';', $v['badge']);
                $badge = ['type' => $v['badge'][0], 'value' => $v['badge'][1]];
            }
            $name_loc = 'NF.System.' . (new \String2($v['name'])->englishOnly()->toString());
            $title_loc = 'NF.System.' . (new \String2($v['description'])->englishOnly()->toString());
            $fixed_url = $v['url'];
            if (!empty($v['url']) && $v['url'][0] == '/' && !empty($v['template'])) {
                $fixed_url = \Request::fixUrl($v['url'], $v['template']);
            }
            $item = [
                'name' => htmlspecialchars($v['name']),
                'name_loc' => htmlspecialchars(loc($name_loc, $v['name'])),
                'title' => $v['description'] ? htmlspecialchars($v['description']) : null,
                'title_loc' => $v['description'] ? htmlspecialchars(loc($title_loc, $v['description'])) : null,
                'module_code' => $v['module_code'],
                'module_abbreviation' => $v['module_code'][0] . '/' . $v['module_code'][1],
                'icon' => $v['icon'],
                'icon_frontend' => $v['icon'] ? \HTML::icon(['type' => $v['icon']]) : null,
                'url' => $fixed_url,
                'child_ordered' => $v['child_ordered'],
                'order' => $v['order'],
                'separator' => $v['separator'],
                'name_generator' => $v['name_generator'],
                'options_generator' => $v['options_generator'],
                'menu_id' => $menu_id,
                '__menu_id' => $v['id'],
                'class' => $v['class'] ?? null,
                'template' => $v['template'] ?? null,
                'badge' => $badge,
                'root' => $v['root'],
            ];
            if (!empty($menu_group_name)) {
                $item['menu_group_names'] = $menu_group_name;
            }
            $menu_id++;
            $existing = array_key_get($result, $key);
            if (!empty($existing)) {
                $existing = array_merge($existing, $item);
            } else {
                $existing = $item;
                $existing['options'] = [];
            }
            array_key_set($result, $key, $existing);
        }
        // generate data from new menus
        foreach ($roots as $v) {
            $last_key = array_key_last($v);
            $result['all_items'][$v[$last_key]] = array_key_get($result, $v);
            // quick actions
            $v[0] = 215;
            $temp = array_key_get($result, $v);
            if (!empty($temp)) {
                $result['quick_actions'][$v[$last_key]] = $temp;
            }
        }
        // footer items
        $result['footer_items'] = $result[230] ?? [];
        return $result;
    }
}
