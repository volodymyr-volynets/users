import ChatPageStandalone from '/../../libraries/vendor/numbers/users/Chats/View/ChatPageStandalone.template.react.tsx';
import { NFTemplateLoadProps, NFTemplateLoadLoaded, NFTemplateMountComponent } from '/src/Numbers/NFTemplateLoader.tsx';

// special function in window scope
window.nfMountChatPageStandalone = function(id) {
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <ChatPageStandalone props={props} loaded={loaded} key={props.__ts} /> });
};

// we mount all roots
$('[id^="numbers_controller_and_view"]').each(function(index) {
    let id = $(this).attr('id');
    const props = NFTemplateLoadProps({ id: id });
    const loaded = NFTemplateLoadLoaded({ id: id });
    NFTemplateMountComponent({ id: id, component: <ChatPageStandalone props={props} loaded={loaded} key={props.__ts} /> });
});