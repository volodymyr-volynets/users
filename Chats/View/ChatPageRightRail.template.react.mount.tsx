import ChatPageRightRail from '/../../libraries/vendor/numbers/users/Chats/View/ChatPageRightRail.template.react.tsx';
import { NFTemplateLoadProps, NFTemplateLoadLoaded, NFTemplateMountComponent } from '/src/Numbers/NFTemplateLoader.tsx';

// special function in window scope
window.nfMountChatPageRightRail = function(id) {
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <ChatPageRightRail props={props} loaded={loaded} key={props.__ts} /> });
};

// we mount all roots
$('[id^="numbers_right_rail_container"]').each(function(index) {
    let id = $(this).attr('id');
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <ChatPageRightRail props={props} loaded={loaded} key={props.__ts} /> });
});