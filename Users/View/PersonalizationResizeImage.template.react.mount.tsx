import PersonalizationResizeImage from '/../../libraries/vendor/numbers/users/Users/View/PersonalizationResizeImage.template.react.tsx';
import { NFTemplateLoadProps, NFTemplateLoadLoaded, NFTemplateMountComponent } from '/src/Numbers/NFTemplateLoader.tsx';

// special function in window scope
window.nfMountPersonalizationResizeImage = function(id) {
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <PersonalizationResizeImage props={props} loaded={loaded} key={props.__ts} /> });
};

// we mount all roots
$('[id^="numbers_controller_and_view_personalization_resize_image"]').each(function(index) {
    let id = $(this).attr('id');
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <PersonalizationResizeImage props={props} loaded={loaded} key={props.__ts} /> });
});