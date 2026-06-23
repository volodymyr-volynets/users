import React, { useEffect, useRef, useState, useLayoutEffect, useMemo } from '/node_modules/react';
import { Card, Col, Row, Form, Modal, Button, Badge, Tooltip, OverlayTrigger, Dropdown, DropdownButton, ButtonGroup } from '/node_modules/react-bootstrap';
import styled from '/node_modules/styled-components';
import { HTML } from '@nm/@numbers-framework/frontend-react';
import { Avatar } from '/src/Numbers/Avatar.jsx';
import { EmojisOptionGrouped } from '/src/Numbers/Emojis.jsx';
import { useOnScreen } from '/src/Numbers/Hooks.jsx';
import {
	MultiRootEditor,
  //DecoupledEditor,
	AutoImage,
	Autosave,
	BlockQuote,
	Bold,
	Code,
	Emoji,
	Essentials,
	GeneralHtmlSupport,
	Heading,
	ImageBlock,
	ImageInsertViaUrl,
	ImageToolbar,
	Indent,
	IndentBlock,
	Italic,
	Link,
	List,
	ListProperties,
	MediaEmbed,
	Mention,
	Paragraph,
	PasteFromOffice,
	Strikethrough,
	Table,
	TableCaption,
	TableCellProperties,
	TableColumnResize,
	TableProperties,
	TableToolbar,
	TodoList,
	Underline,
	WordCount
} from '/node_modules/ckeditor5';
import { useMultiRootEditor } from '/node_modules/@ckeditor/ckeditor5-react';
import '/node_modules/ckeditor5/dist/ckeditor5.css';
import '/src/Numbers/custom.css'; // as second
import { SocketInstance } from '/src/Numbers/SocketIO.js';
import { WebStorageGetItem, WebStorageSetItem } from '/src/Numbers/WebStorage.jsx';
import { RequestAppURL, RequestApiURL, RequestAPIRawPost, RequestAPIPost, RequestRedirect, RequestFormData, RequestFormPost } from '/src/Numbers/Request.ts';
//import { toast } from '/node_modules/react-toastify';
//import { useNavigate } from "/node_modules/react-router-dom";
import { useDropzone } from "/node_modules/react-dropzone";
import SpeechRecognition, { useSpeechRecognition } from "/node_modules/react-speech-recognition";
import { InternalizationGlobal, loc } from '/src/Numbers/Internalization.jsx';
import SpinningVerbComponent from '/src/Numbers/AI/SpinningVerbComponent.jsx';
import DOMPurify from '/node_modules/dompurify';
// import tailwind 4 via 2 helpers
import '/src/Numbers/view_tailwind.css';
import '/src/tailwind.css';

const ComponentConversationRowsUl = styled.ul`
  padding: 0 !important;
`;

const TimestampSpan = styled.span`
  color: grey;
`;

const UserSpan = styled.span`
  font-weight: bold;
  color: black;
`;

const ReactionNewEmojiSpan = styled.span`
  font-size: 1em;
  cursor: hand;
  cursor: pointer;
  color: grey;
  vertical-align: top;
  &:hover {
    font-weight: bold;
    color: black;
  }
`;

const ReactionAddedSpan = styled.span`
  font-size: 1em;
  color: grey;
  vertical-align: top;
  background-color: var(--bs-light);
  margin-left: 2em;
`;

const ThreadAddedSpan = styled.span`
  /*margin-left: 0em;*/
`;

const ThreadAddedA = styled.a`
  cursor: hand;
  cursor: pointer;
  font-size: 1em;
  color: grey;
  vertical-align: top;
  background-color: var(--bs-light);
  text-decoration: underline;
`;

const ThreadAddedARed = styled.a`
  cursor: hand;
  cursor: pointer;
  font-size: 1em;
  color: red;
  vertical-align: top;
  background-color: var(--bs-light);
  text-decoration: underline;
`;

const ReactionSmallMenuDiv = styled.div`
  position: absolute;
  top: 0;
  left: 0;
  width: 16em;
  height: 16em;
  overflow-y: scroll;
  z-index: 501;
  border: 1px solid #000;
  color: #000;
  background-color: #f5f5f5;
`;

const ReactionSmallMenuA = styled.a`
  cursor: hand;
  cursor: pointer;
  font-size: 1.5em;
`;

const ContextSmallMenuDiv = styled.div`
  position: absolute;
  top: 0;
  left: 0;
  width: 30em;
  height: 16em;
  overflow-y: scroll;
  z-index: 501;
  border: 1px solid #000;
  color: #000;
  background-color: #f5f5f5;
`;

const ReplySmallMenuDiv = styled.div`
  position: absolute;
  top: 0;
  left: 0;
  width: 16em;
  z-index: 502;
  border: 1px solid #000;
  color: #000;
  background-color: #f5f5f5;
`;

const ReplySmallMenuDivA = styled.a`
  cursor: hand;
  cursor: pointer;
  font-size: 1em;
  color: grey !important;
  text-decoration: underline !important;
`;

const ReplyInThreadHolderDiv = styled.div`
  position: absolute;
  left: 50%;
  width: 50%;
  height: 100%;
  z-index: 510;
  border: 1px solid #000000;
  color: #000000;
  background-color: #ffffff;
  margin-right: 1em;
`;

const UnreadHr = styled.hr`
  background-color: red;
  height: 1px;
  border: 0;
`;

const UnreadB = styled.b`
  color: red;
`;

const ScrollA = styled.a`
  scroll-margin-top: 60px;
`;

const ChannelA = styled.a<{ $bold?: boolean; }>`
  cursor: hand;
  cursor: pointer;
  font-weight: ${props => props.$bold ? "bold" : "regular"};
  padding-left: 1em;
  overflow: hidden;
  height: 1.5em;
  line-height: 1.5em;
  display: inline-block;
  vertical-align: middle;
`;

const ChannelJoin = styled.a``;

const ChannelTr = styled.tr<{ $bold?: boolean; }>`
  background-color: ${props => props.$bold ? "#f2f2f2" : "#fff"};
  padding: 2px;
  border: ${props => props.$bold ? "1px solid #ccc" : "none"};
`;

const ChannelsLabel = styled.h6`
  display: inline-block;
`;

const LeftBarHolder = styled.div`
  color: #000;
  /*background-color: #f5f5f5;*/
`;

const TypeI = styled.i`
  color: grey;
`;

const MaskOverlayDiv = styled.div`
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 500;
  background: rgba(0, 0, 0, 0.25)
`;

const AknowledgementHolder = styled.div`
  display: inline-block;
  float: right;
  border: 1px solid grey;
  background-color: lightgrey;
  border-radius: 1em;
  padding-left: 1em;
  padding-right: 1em;
`;

const MicrophoneSpeechDiv = styled.div`
  cursor: hand;
  cursor: pointer;
  position: absolute;
  right: 1em;
  margin-top: 0.75em;
  border-radius: 10%;
  border: 1px solid black;
  background: #f2f3f2;
  z-index: 100;
  &:hover {
    border: 1px solid grey;
  }
`;

const EditableElementsDiv = styled.div`
  border: 1px solid black;
`;

const ImgPhoto = styled.img`
  cursor: pointer;
	cursor: hand;
	position: relative;
	border-radius: 50%;
	border: 3px solid white;
	display: inline-block;
`;

const renderMessageAttachementsFull = (attachments, isImage) => {
  const listItems = attachments.map((attachment) => {
    if (isImage) {
      return (
        <>
          <div style={{ width: '100%' }}>
            <a href={attachment['file_url']} target="_blank" rel="noopener noreferrer">
              <img
                src={attachment['file_url']}
                alt={'Image'}
                style={{ width: '100%', height: 'auto', display: 'block' }}
              />
            </a>
          </div>
        </>
      );
    }
    return (
      <>
        <a href={attachment['file_url']} target="_blank" rel="noopener noreferrer">
          <HTML.Icon tag="i" type="fa-solid fa-link" /> {attachment['file_name']}
        </a>
        <br/>
      </>
    );
  });
  return (
    <>
      {listItems}
    </>
  );
};

const RenderHtmlOnce = ({ html, className, key }) => {
  const ref = useRef(null);

  useEffect(() => {
    ref.current.innerHTML = DOMPurify.sanitize(html);
  }, []);

  return <div ref={ref} className={className} key={key} />;
};

const RenderMessageFullMemo = ({prefix, value}) => {
  const sanitizedHTML = useMemo(() => {
    return DOMPurify.sanitize(value['c5_chatmessage_message']);
  }, [value['c5_chatmessage_message']]);
  return (
    <>
      <div
        key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-full'}
      >
        {value['c5_chatmessage_is_loading'] == 1 && (
          <>
            <table
              key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-loading'}
              width="100%"
            >
              <tr>
                <td width="50">
                  <img src="/assets/img/loading_color_50x18.gif" style={{ width: '50px', height: '18px' }} alt="Loading..." />
                </td>
                <td>
                  <SpinningVerbComponent
                    type={value['c5_chatmessage_is_image'] ? 'is_image' : 'is_text'}
                    duration={5000}
                    category={false}
                  />
                </td>
              </tr>
            </table>
          </>
        )}
        {value['c5_chatmessage_is_loading'] == 0 && !value['mention_c5_chatmessage_id'] && (
          <>
            <RenderHtmlOnce
              html={value['c5_chatmessage_message']}
              className="nf_chat_message"
              key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-content'}
            />
            {/*
            <HTML.Tag
              key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-content'}
              value={value['c5_chatmessage_message']}
              have_html={true}
              tag="div"
              class="nf_chat_message"
            />*/}
            {value['message_attachments'] && (
              <>
                <div
                  key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-attachments'}
                  className="nf_chat_message"
                >
                  {renderMessageAttachementsFull(value['message_attachments'], value['c5_chatmessage_is_image'])}
                </div>
              </>
            )}
          </>
        )}
        {value['c5_chatmessage_is_loading'] == 0 && value['mention_c5_chatmessage_id'] && (
          <>
            <figure class="chat_mention_figure">
              <Avatar
                name={value['mention_c5_chatuser_um_user_name']}
                colors={value['mention_c5_chatuser_avatar_colors']}
                title={value['mention_c5_chatuser_um_user_name']}
                last_seen={null}
              />
              {' '}
              <UserSpan>
                {value['mention_c5_chatuser_um_user_name']}
              </UserSpan>
              {' '}
              <TimestampSpan>
                {value['mention_c5_chatmessage_inserted_formatted']}
              </TimestampSpan>
              <br/>
              <blockquote class="blockquote">
                <RenderHtmlOnce
                  html={value['c5_chatmessage_message']}
                  className="nf_chat_message"
                  key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-content'}
                />
              </blockquote>
              <figcaption class="blockquote-footer">
                Original message...
              </figcaption>
            </figure>
          </>
        )}
        {value['c5_chatmessage_is_loading'] == 0 && value['um_usrsign_content_wysiwyg'] && (
          <>
            <RenderHtmlOnce
              html={value['um_usrsign_content_wysiwyg']}
              className="nf_chat_message_signature"
              key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-signature'}
            />
          </>
        )}
        {value['c5_chatmessage_is_loading'] == 0 && value['um_usrterm_content_wysiwyg'] && (
          <>
            <RenderHtmlOnce
              html={value['um_usrterm_content_wysiwyg']}
              className="nf_chat_message_terms"
              key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-terms'}
            />
          </>
        )}
      </div>
    </>
  );
};

const ChatPageStandalone = ({
  colBreakpoints = { xs: 12, md: 12, lg: 12, xxl: 12 },
  props,
  loaded,
}: any) => {
  const {
    c5_chat_tenant_id: ChatTenantID,
    c5_chat_uuid: ChatUUID,
    c5_chat_id: ChatID,
    um_user_id: ChatUserID,
    chat_data: ChatData,
    __run_uuid: RunUUID,
    // can
    acl_can: AclCan,
    // dates
    date_today: DateToday,
    date_yesterday: DateYesterday,
  } = props;

  const {
    Internalization,
    Users,
  } = loaded;

  InternalizationGlobal.Groups = Internalization.Groups;
  InternalizationGlobal.Settings = Internalization.Settings;
  const User = Users.Settings;

  const getEditorFeedItems = (queryText) => {
      return new Promise(resolve => {
          setTimeout(async () => {
            if (!AclCan.AllowChatUserMentions) {
              resolve([{
                "id": "@mention_not_authorized",
                "userId": -999999999,
                "name": loc('NF.Form.PleaseLogin', 'Please login'),
                "text": loc('NF.Form.NotAuthorized', 'Not Authorized'),
              }]);
              return;
            }
            let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetMentions', {
              um_user_name: queryText,
            });
            if (result.success) {
              resolve(result.mentions);
            }
          }, 100);
      });
  };

  const getEditorFeedOther = (queryText) => {
      return new Promise(resolve => {
          setTimeout(async () => {
            if (!AclCan.AllowChatOtherMentions) {
              resolve([{
                "id": "@mention_not_authorized",
                "userId": -999999999,
                "name": loc('NF.Form.PleaseLogin', 'Please login'),
                "text": loc('NF.Form.NotAuthorized', 'Not Authorized'),
              }]);
              return;
            }
            let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetQuickSearchAndMentions', {
              query_text: queryText,
            });
            if (result.success) {
              resolve(result.mentions);
            }
          }, 100);
      });
  };

  const getEditorFeedChannels = (queryText) => {
      return new Promise(resolve => {
          setTimeout(async () => {
            if (!AclCan.AllowChatChannelMentions) {
              resolve([{
                "id": "#mention_not_authorized",
                "userId": -999999999,
                "name": loc('NF.Form.PleaseLogin', 'Please login'),
                "text": loc('NF.Form.NotAuthorized', 'Not Authorized'),
              }]);
              return;
            }
            let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetChannelMentions', {
              query_text: queryText,
            });
            if (result.success) {
              resolve(result.mentions);
            }
          }, 100);
      });
  };

  function MentionCustomization(editor) {
    editor.conversion.for('upcast').elementToAttribute({
      view: {
        name: 'a',
        key: 'data-mention',
        classes: 'mention',
        attributes: {
          href: true,
          'data-user-id': true,
        }
      },
      model: {
        key: 'mention',
        value: viewItem => {
          const mentionAttribute = editor.plugins.get('Mention').toMentionAttribute(viewItem, {
            link: viewItem.getAttribute('href'),
            userId: viewItem.getAttribute('data-user-id')
          });
          return mentionAttribute;
        }
      },
      converterPriority: 'high'
    });

    editor.conversion.for('downcast').attributeToElement({
      model: 'mention',
      view: ( modelAttributeValue, { writer } ) => {
        if ( !modelAttributeValue ) {
          return;
        }
        let mention_type = '';
        if (modelAttributeValue.id[0] == '@') {
          mention_type = 'user';
        } else if (modelAttributeValue.id[0] == '~') {
          mention_type = 'other';
        } else if (modelAttributeValue.id[0] == '#') {
          mention_type = 'channel';
        }
        return writer.createAttributeElement('a', {
          class: 'mention',
          'data-mention': modelAttributeValue.id,
          'data-user-id': modelAttributeValue.userId,
          'href': modelAttributeValue.link ? modelAttributeValue.link : 'javascript:void(0)',
          'data-mention-type': mention_type,
        }, {
          priority: 20,
          id: modelAttributeValue.uid
        });
      },
      converterPriority: 'high'
    });
  };

  const editorProps = {
    editor: MultiRootEditor,
    data: {
      //intro: '',
      content: '',
    },
    config: {
      licenseKey: 'GPL',
      placeholder: loc('NF.Form.AskAnythingDots', 'Ask anything...'),
      plugins: [
        AutoImage,
        Autosave,
        BlockQuote,
        Bold,
        Code,
        Emoji,
        Essentials,
        GeneralHtmlSupport,
        Heading,
        ImageBlock,
        ImageInsertViaUrl,
        ImageToolbar,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        ListProperties,
        MediaEmbed,
        Mention,
        MentionCustomization,
        Paragraph,
        PasteFromOffice,
        Strikethrough,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TodoList,
        Underline,
        WordCount
      ],
      mention: {
        feeds: [
          {
            marker: '~',
            feed: getEditorFeedOther,
            minimumCharacters: 1,
            itemRenderer: (item) => {
              const domElement = document.createElement('div');
              domElement.classList.add('numbers_mention_item');
              domElement.innerHTML = `
                <b class="numbers_mention_item_b">${item.name}</b> <small class="numbers_mention_item_b" style="color: gray;">${item.id}</small>
              `;
              return domElement;
            }
          },
          {
            marker: '@',
            feed: getEditorFeedItems,
            minimumCharacters: 1,
            itemRenderer: (item) => {
              const domElement = document.createElement('div');
              domElement.classList.add('numbers_mention_item');
              domElement.innerHTML = `
                <b class="numbers_mention_item_b">${item.name}</b> <small class="numbers_mention_item_b" style="color: gray;">${item.id}</small>
              `;
              return domElement;
            }
          },
          {
            marker: '#',
            feed: getEditorFeedChannels,
            minimumCharacters: 1,
            itemRenderer: (item) => {
              const domElement = document.createElement('div');
              domElement.classList.add('numbers_mention_item');
              domElement.innerHTML = `
                <b class="numbers_mention_item_b">${item.name}</b> <small class="numbers_mention_item_b" style="color: gray;">${item.id}</small>
              `;
              return domElement;
            }
          },
        ]
      },
      toolbar: [
        //'undo',
        //'redo',
        //'|',
        'heading',
        '|',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'code',
        '|',
        'emoji',
        'link',
        'insertImageViaUrl',
        'mediaEmbed',
        'insertTable',
        'blockQuote',
        '|',
        'bulletedList',
        'numberedList',
        'todoList',
        'outdent',
        'indent'
      ]
    }
  };

  const {
    editor,
    toolbarElement,
    editableElements,
    data,
    setData,
    attributes,
    setAttributes
  } = useMultiRootEditor(editorProps);

  const {
    editor: editor2,
    toolbarElement: toolbarElement2,
    editableElements: editableElements2,
    data: data2,
    setData: setData2,
    attributes: attributes2,
    setAttributes: setAttributes2,
  } = useMultiRootEditor(editorProps);

  const [intervalTime, setIntervalTime] = useState(Date.now());
  const [lastUpdateTime, setLastUpdateTime] = useState(Date.now());
  const [toolbarElementOpen, setToolbarElementOpen] = useState(false);
  const conversationListHolderRef = useRef(null);
  const [conversationListHolderHeight, setConversationListHolderHeight] = useState(100);
  const conversationRowsRef = useRef(null);
  const [conversationRowsData, setConversationRowsData] = useState([]);
  const [conversationLastMessageID, setConversationLastMessageID] = useState(null);
  const [chatSessionData, setChatSessionData] = useState([]);
  const [chatChannelData, setChatChannelData] = useState([]);
  const [chatDirectMessageData, setChatDirectMessageData] = useState([]);
  const [chatChatData, setChatChatData] = useState(ChatData);
  const [chatContextData, setChatContextData] = useState([]);
  const conversationMessageEndRef = useRef(null);
  const conversationMessageUnreadRef = useRef(null);
  const [conversationMessageUnreadState, setConversationMessageUnreadState] = useState(true);
  const [reactionDivOpen, setReactionDivOpen] = useState(false);
  const [replyDivOpen, setReplyDivOpen] = useState(false);
  const [replyInThreadDivElement, setReplyInThreadDivElement] = useState(false);
  const [replyInThreadDivHeight, setReplyInThreadDivHeight] = useState(100);
  const [replyRowsData, setReplyRowsData] = useState([]);
  const [replyRowsLastMessageID, setReplyRowsLastMessageID] = useState(null);
  const [replyToolbarElementOpen, setReplyToolbarElementOpen] = useState(false);
  const reactionSmallMenuRef = useRef(null);
  const replySmallMenuRef = useRef(null);
  const entireChatRef = useRef(null);
  const unreadConversationsRef = useRef([]);
  const [contextDivOpen, setContextDivOpen] = useState(false);
  const [contextValueLoaded, setContextValueLoaded] = useState(null);
  const [contextGlobalOpen, setContextGlobalOpen] = useState(false);
  const [copiedOpen, setCopiedOpen] = useState(false);

  const [updateMessage, setUpdateMessage] = useState(null);

  const [canvasesData, setCanvasesData] = useState(null);
  const [canvasesModalShow, setCanvasesModalShow] = useState(null);
  const [canvasesModalData, setCanvasesModalData] = useState({});

  const fileChatInputRef = useRef(null);
  const [fileChatInputCount, setFileChatInputCount] = useState(null);
  const [fileChatInputError, setFileChatInputError] = useState(null);
  const [fileChatInputFiles, setFileChatInputFiles] = useState(null);
  const { getRootProps:fileChatGetRootProps, getInputProps:fileChatGetInputProps, isDragActive:fileChatIsDragActive } = useDropzone({
    onDrop: (files: any) => {
      setFileChatInputCount(files.length > 0 ? files.length : null);
      if (files.length > 0) {
        setFileChatInputFiles(Array.from(files));
      } else {
        setFileChatInputFiles(null);
      }
    },
  });
  const fileThreadInputRef = useRef(null);
  const [fileThreadInputCount, setFileThreadInputCount] = useState(null);
  const [fileThreadInputFiles, setFileThreadInputFiles] = useState(null);

  const [ragToggle, setRagToggle] = useState(localStorage.getItem('nf_chat_rag_enabled') == '1' ? true : false);
  const [ragChatInputError, setRagChatInputError] = useState(null);
  const [deepLearningToggle, setDeepLearningToggle] = useState(false);
  const [imageGenerationToggle, setImageGenerationToggle] = useState(localStorage.getItem('nf_chat_image_enabled') == '1' ? true : false);
  const [soundGenerationToggle, setSoundGenerationToggle] = useState(localStorage.getItem('nf_chat_sound_enabled') == '1' ? true : false);
  const [transcriptGenerationToggle, setTranscriptGenerationToggle] = useState(localStorage.getItem('nf_chat_transcript_enabled') == '1' ? true : false);
  const [signatureToggle, setSignatureToggle] = useState(localStorage.getItem('nf_chat_signature_enabled') == '1' ? true : false);
  const [termsToggle, setTermsToggle] = useState(localStorage.getItem('nf_chat_terms_enabled') == '1' ? true : false);
  const [noAIToggle, setNoAIToggle] = useState(false);
  const [noAIChanged, setNoAIChanged] = useState(false);

  const {
    browserSupportsSpeechRecognition,
    browserSupportsContinuousListening,
    transcript,
    listening,
    resetTranscript
  } = useSpeechRecognition();
  const [speechChatToggle, setSpeechChatToggle] = useState(false);

  const ChatRoomIDs = ['ChatPageStandalone' + '::' + ChatTenantID + '_' + ChatID];
  const [socketInstanceIsConnected, setSocketInstanceIsConnected] = useState(SocketInstance.connected);

  // initial calls to update everything
  useEffect(() => {
      // initialize sockets
      SocketInstance.on('connect', () => {
          setSocketInstanceIsConnected(true);
          SocketInstance.emit('join', {'rooms': ChatRoomIDs});
      });
      SocketInstance.on('disconnect', () => {
          setSocketInstanceIsConnected(false);
      });
      if (!socketInstanceIsConnected) {
          SocketInstance.connect();
      }
      SocketInstance.on('update', async (message) => {
          setUpdateMessage(message);
      });

      // first time we call everything
      queryForFormUpdates(true);
      queryForThreadUpdates(null);
      queryForChatChannels();
      queryForCanvasesUpdates();

      // query API every half a second if we have updates
      const interval = setInterval(() => {
        setIntervalTime(Date.now());
        if (updateMessage) {
          console.log(updateMessage);
          setUpdateMessage(null);
          // call apis
          queryForFormUpdates(false);
          queryForThreadUpdates(null);
          queryForChatChannels();
        }
      }, 500);

      return () => {
          // disable sockets
          SocketInstance.off('connect');
          SocketInstance.off('disconnect');
          SocketInstance.off('update');
          SocketInstance.disconnect();
          // disable interval
          clearInterval(interval);
      }
  }, []);

  useLayoutEffect(() => {
    if (conversationListHolderRef.current) {
      const { top, height } = conversationListHolderRef.current.getBoundingClientRect();
      const { innerWidth: screenWidth, innerHeight: screenHeight } = window;
      const newHeight = screenHeight - (top + height) - 85;
      setConversationListHolderHeight(newHeight);
    }
  }, []);

  // if 5 seconds pass we auto refresh
  useEffect(() => {
    if (((intervalTime - lastUpdateTime) / 1000) > 5) {
      queryForFormUpdates(false);
      queryForThreadUpdates(null);
      queryForChatChannels();
    }
    if (((intervalTime - lastUpdateTime) / 1000) > 15) {
      queryForCanvasesUpdates();
    }
    return () => {};
  }, [intervalTime, lastUpdateTime]);

  // observer to remove unseen
  useEffect(() => {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const messageID = parseInt(entry.target.dataset['c5_chatmessage_id']);
          const isThread = parseInt(entry.target.dataset['c5_chatmessage_is_thread']);
          const threadID = parseInt(entry.target.dataset['c5_chatmessage_thread_c5_chatmessage_id']);
          let needUpdate = false;
          if (isThread) {
            const unreadID = parseInt(entry.target.dataset['c5_chatusrthrdunrd_unread_c5_chatmessage_id']);
            if (messageID > unreadID && threadID > 0) {
              needUpdate = true;
            }
          } else {
            const unreadID = parseInt(entry.target.dataset['current_unread_c5_chatmessage_id']);
            if (messageID > unreadID) {
              needUpdate = true;
            }
          }
          if (needUpdate) {
            let result = RequestAPIPost('/API/V1/C5/ChatMessages/_RemoveUnseen', {
              c5_chatuser_c5_chat_id: ChatData.c5_chat_id,
              c5_chatuser_um_user_id: ChatUserID,
              c5_chatuser_unread_c5_chatmessage_id: messageID,
              c5_chatmessage_is_thread: isThread ? 1 : 0,
              c5_chatmessage_thread_c5_chatmessage_id: threadID,
            });
            if (result.success) {
              queryForFormUpdates(false);
              queryForThreadUpdates(null);
              queryForChatChannels();
            }
          }
          //console.log(`${entry.target.id} is visible`);
        }
      });
    }, { threshold: 0.5 });

    const unseenInterval = setInterval(() => {
      unreadConversationsRef.current.forEach(el => {
        if (el) {
          observer.observe(el);
        }
      });
    }, 2000);

    return () => {
        clearInterval(unseenInterval);
        observer.disconnect();
    }
  }, []);

  const handleKeyDown = (event) => {
    if (event.key === 'Enter' && (event.ctrlKey || event.metaKey)) {
      event.preventDefault();
      handleSubmitClick(data);
    }
  };

  useEffect(() => {
    document.addEventListener('keydown', handleKeyDown);
    return () => {
        document.removeEventListener('keydown', handleKeyDown);
    };
  }, [handleKeyDown]);

  useEffect(() => {
    const handleAddPromptSubformEvent = (event: any) => {
      // check if its the same chat
      if (event.detail['__run_uuid'] != RunUUID) {
        return;
      }
      setData({
        content: '<p>' + event.detail['ai_prompt_content'] + '</p>',
      })
    };
    window.addEventListener('nf_c5_chat_add_prompt_form_event', handleAddPromptSubformEvent);
    return () => window.removeEventListener('nf_c5_chat_add_prompt_form_event', handleAddPromptSubformEvent);
  }, []);

  useEffect(() => {
    const handleAddRAGSubformEvent = (event: any) => {
      localStorage.setItem('nf_chat_rag_c5_chatmessage_rag_settings_json', JSON.stringify(event.detail));
      setRagChatInputError(null);
    };
    window.addEventListener('nf_c5_chat_add_rag_form_event', handleAddRAGSubformEvent);
    return () => window.removeEventListener('nf_c5_chat_add_rag_form_event', handleAddRAGSubformEvent);
  }, []);

  useEffect(() => {
    const handleAddImageSubformEvent = (event: any) => {
      localStorage.setItem('nf_chat_image_c5_chatmessage_image_settings_json', JSON.stringify(event.detail));
    };
    window.addEventListener('nf_c5_chat_add_image_form_event', handleAddImageSubformEvent);
    return () => window.removeEventListener('nf_c5_chat_add_image_form_event', handleAddImageSubformEvent);
  }, []);

  useEffect(() => {
    const handleAddSoundSubformEvent = (event: any) => {
      localStorage.setItem('nf_chat_sound_c5_chatmessage_sound_settings_json', JSON.stringify(event.detail));
    };
    window.addEventListener('nf_c5_chat_add_sound_form_event', handleAddSoundSubformEvent);
    return () => window.removeEventListener('nf_c5_chat_add_sound_form_event', handleAddSoundSubformEvent);
  }, []);

  useEffect(() => {
    const handleAddTranscriptSubformEvent = (event: any) => {
      localStorage.setItem('nf_chat_transcript_c5_chatmessage_transcript_settings_json', JSON.stringify(event.detail));
    };
    window.addEventListener('nf_c5_chat_add_transcript_form_event', handleAddTranscriptSubformEvent);
    return () => window.removeEventListener('nf_c5_chat_add_transcript_form_event', handleAddTranscriptSubformEvent);
  }, []);

  const queryForChatChannels = async () => {
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetChannels', {
        um_user_id: ChatUserID,
        sm_session_id: ChatData.c5_chatsession_sm_session_id,
        c5_chat_id: ChatData.c5_chat_id,
    });
    if (result?.success) {
      setChatChannelData(result.channels);
      setChatSessionData(result.sessions);
      setChatDirectMessageData(result.direct_messages);
      setChatContextData(result.context);
      // set last update time
      setLastUpdateTime(Date.now());
    }
  };

  const queryForFormUpdates = async (first_run) => {
    // if in new chat mode we do not need updates
    if (!ChatData.c5_chat_id) {
      return;
    }
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetMessages', {
        c5_chat_id: ChatData.c5_chat_id,
        um_user_id: ChatUserID,
        sm_session_id: ChatData.c5_chatsession_sm_session_id,
    });
    if (result?.success) {
      setConversationRowsData(Object.values(result.messages));
      setConversationLastMessageID(result.last);
      // side bar data
      setChatSessionData(result.sessions);
      setChatChannelData(result.channels);
      setChatDirectMessageData(result.direct_messages);
      // top message bar
      setChatChatData(result.chat_data);
      // no ai
      if (!noAIChanged) {
        setNoAIToggle(result.chat_data['c5_chat_no_ai']);
      } else {
        setNoAIChanged(false);
      }
      // scroll to the bottom of the div on first load
      if (first_run && location.href.includes('#c5-cm-id-')) {
        let anchor = location.href.split('#')[1];
        setReplyInThreadDivElement(null);
        setTimeout(() => {
          document.querySelector('[id="' + anchor +  '"]').scrollIntoView();
        }, 1000);
      } else if (conversationMessageUnreadState) {
        setConversationMessageUnreadState(false);
        setTimeout(() => {
          if (conversationMessageUnreadRef.current) {
            conversationMessageUnreadRef.current?.scrollIntoView({ behavior: 'smooth', block: 'end' });
          } else {
            conversationMessageEndRef.current?.scrollIntoView({ behavior: 'smooth', block: 'end' });
          }
        }, 1000);
      }
    }
    // set last update time
    setLastUpdateTime(Date.now());
  };

  const queryForCanvasesUpdates = async () => {
    // we need to be in a channel
    if (!ChatData.c5_chat_id || !ChatUserID) {
      return;
    }
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetCanvases', {
        c5_chatcanvsmap_c5_chat_id: ChatData.c5_chat_id,
        c5_chatcanvslstuser_um_user_id: ChatUserID,
    });
    if (result?.success) {
      setCanvasesData(result.data);
    }
  };

  const queryForCanvasesUpdateOneRecord = async (c5_chatcanvslist_id, c5_chatcanvslist_c5_chatcanvas_code, c5_chatcanvslstuser_inactive) => {
    // we need to be in a channel
    if (!ChatData.c5_chat_id || !ChatUserID) {
      return;
    }
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetCanvases', {
        c5_chatcanvsmap_c5_chat_id: ChatData.c5_chat_id,
        c5_chatcanvslstuser_um_user_id: ChatUserID,
        c5_chatcanvslist_id: c5_chatcanvslist_id,
        c5_chatcanvslist_c5_chatcanvas_code: c5_chatcanvslist_c5_chatcanvas_code,
        c5_chatcanvslstuser_inactive: c5_chatcanvslstuser_inactive ? 0 : 1,
    });
    if (result?.success) {
      const firstKey = Object.keys(result.data)[0];
      setCanvasesModalData({
        title: result.data[firstKey][c5_chatcanvslist_c5_chatcanvas_code]['c5_chatcanvas_name'],
        content: result.data[firstKey][c5_chatcanvslist_c5_chatcanvas_code]['c5_chatcanvas_html_wysiwyg'],
        list: result.data[firstKey][c5_chatcanvslist_c5_chatcanvas_code]['c5_chatcanvas_list'] ?? {},
      });
    }
  };

  const queryForThreadUpdates = async (c5_chatmessage_id) => {
    // if in new chat mode we do not need updates
    let id = c5_chatmessage_id ? c5_chatmessage_id : replyInThreadDivElement;
    if (!id) {
      return;
    }
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetMessages', {
        c5_chat_id: ChatData.c5_chat_id,
        um_user_id: ChatUserID,
        sm_session_id: ChatData.c5_chatsession_sm_session_id,
        // thread settings
        c5_chatmessage_is_thread_id: id,
    });
    if (result.success) {
      setReplyRowsData(Object.values(result.messages));
      setReplyRowsLastMessageID(result.last);
    }
    // set last update time
    setLastUpdateTime(Date.now());
  };

  const handleSubmitClick = async (dataSubmit) => {
    if (!dataSubmit.content || dataSubmit.content == '<p></p>') {
      return;
    }
    if (fileChatInputCount && fileChatInputCount > 30) {
      return;
    }
    // signature
    let c5_chatmessage_um_usrsign_id = null;
    if (localStorage.getItem('nf_chat_signature_enabled') == '1') {
      c5_chatmessage_um_usrsign_id = parseInt(localStorage.getItem('nf_chat_signature_um_usrsign_id') ?? '');
    }
    // terms
    let c5_chatmessage_um_usrterm_id = null;
    if (localStorage.getItem('nf_chat_terms_enabled') == '1') {
      c5_chatmessage_um_usrterm_id = parseInt(localStorage.getItem('nf_chat_terms_um_usrterm_id') ?? '');
    }
    // image
    let c5_chatmessage_is_image = 0;
    let c5_chatmessage_image_settings_json = null;
    if (localStorage.getItem('nf_chat_image_enabled') == '1') {
      c5_chatmessage_is_image = 1;
      const saved = JSON.parse(localStorage.getItem('nf_chat_image_c5_chatmessage_image_settings_json') ?? '{}');
      c5_chatmessage_image_settings_json = saved;
    }
    // sound
    let c5_chatmessage_is_sound = 0;
    let c5_chatmessage_sound_settings_json = null;
    if (localStorage.getItem('nf_chat_sound_enabled') == '1' && c5_chatmessage_is_image == 0) {
      c5_chatmessage_is_sound = 1;
      const saved = JSON.parse(localStorage.getItem('nf_chat_sound_c5_chatmessage_sound_settings_json') ?? '{}');
      c5_chatmessage_sound_settings_json = saved;
    }
    // transcript
    let c5_chatmessage_is_transcript = 0;
    let c5_chatmessage_transcript_settings_json = null;
    if (localStorage.getItem('nf_chat_transcript_enabled') == '1' && c5_chatmessage_is_image == 0 && c5_chatmessage_is_sound == 0) {
      c5_chatmessage_is_transcript = 1;
      const saved = JSON.parse(localStorage.getItem('nf_chat_transcript_c5_chatmessage_transcript_settings_json') ?? '{}');
      c5_chatmessage_transcript_settings_json = saved;
      if (!fileChatInputCount) {
        setFileChatInputError(loc('NF.Form.NeedAudio', 'Need Audio'));
        return;
      }
    }
    // RAG
    let c5_chatmessage_is_rag = 0;
    let c5_chatmessage_rag_settings_json = null;
    if (localStorage.getItem('nf_chat_rag_enabled') == '1') {
      c5_chatmessage_is_rag = 1;
      const saved = JSON.parse(localStorage.getItem('nf_chat_rag_c5_chatmessage_rag_settings_json') ?? '{}');
      if (typeof saved['ai_ragtype_code'] == 'undefined') {
        setRagChatInputError(loc('NF.Form.NeedRAG', 'Need RAG'));
        return;
      }
      c5_chatmessage_rag_settings_json = saved;
    }
    // post message
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_PostMessage', {
      c5_chatmessage_c5_chat_id: ChatData.c5_chat_id,
      c5_chatmessage_um_user_id: ChatData.c5_chatuser_um_user_id,
      c5_chatmessage_sm_session_id: ChatData.c5_chatsession_sm_session_id,
      c5_chatmessage_um_user_name: ChatData.c5_chatuser_um_user_name ?? ChatData.c5_chatsession_um_user_name,
      c5_chatmessage_no_data_model_role_code: 'user',
      c5_chatmessage_language_code: ChatData.c5_chat_language_code,
      c5_chatmessage_message: dataSubmit.content,
      c5_chatmessage_is_new: 1,
      c5_chatmessage_is_file: fileChatInputCount ? 1 : 0,
      c5_chatmessage_um_usrsign_id: c5_chatmessage_um_usrsign_id,
      c5_chatmessage_um_usrterm_id: c5_chatmessage_um_usrterm_id,
      c5_chatmessage_reasoning_json: {effort: deepLearningToggle ? 'high' : 'low'},
      // image generation
      c5_chatmessage_is_image: c5_chatmessage_is_image,
      c5_chatmessage_image_settings_json: c5_chatmessage_image_settings_json,
      // sound generation
      c5_chatmessage_is_sound: c5_chatmessage_is_sound,
      c5_chatmessage_sound_settings_json: c5_chatmessage_sound_settings_json,
      // transcript
      c5_chatmessage_is_transcript: c5_chatmessage_is_transcript,
      c5_chatmessage_transcript_settings_json: c5_chatmessage_transcript_settings_json,
      // RAG
      c5_chatmessage_is_rag: c5_chatmessage_is_rag,
      c5_chatmessage_rag_settings_json: c5_chatmessage_rag_settings_json,
    });
    if (result.success) {
      // upload files after we create a message
      if (fileChatInputCount) {
        let formData = new FormData();
        for (let file of fileChatInputFiles) {
          formData.append('files[]', file);
        }
        formData.append('c5_chatmessage_id', result.c5_chatmessage_id);
        let upload = await RequestFormData('/API/V1/C5/ChatMessages/_PostUploadFiles', formData);
        if (upload.success) {
          setFileChatInputCount(null);
          setFileChatInputFiles(null);
          setFileChatInputError(null);
        }
      }
      // uncheck toggles
      handleTranscriptToggle(false);
      handleImageToggle(false);
      handleSoundToggle(false);
      // emit and update
      SocketInstance.emit('update', {'rooms': ChatRoomIDs, message: 'Posted new message!'});
      queryForFormUpdates(false);
      setData({
        content: '',
      });
    }
    // reset errors
    setRagChatInputError(null);
  };

  const handleReplyThreadSubmitClick = async (dataSubmit) => {
    if (!replyInThreadDivElement || !dataSubmit.content || dataSubmit.content == '<p></p>') {
      return;
    }

    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_PostMessage', {
      c5_chatmessage_c5_chat_id: ChatData.c5_chat_id,
      c5_chatmessage_um_user_id: ChatData.c5_chatuser_um_user_id,
      c5_chatmessage_sm_session_id: ChatData.c5_chatsession_sm_session_id,
      c5_chatmessage_um_user_name: ChatData.c5_chatuser_um_user_name ?? ChatData.c5_chatsession_um_user_name,
      c5_chatmessage_no_data_model_role_code: 'user',
      c5_chatmessage_language_code: ChatData.c5_chat_language_code,
      c5_chatmessage_message: dataSubmit.content,
      c5_chatmessage_thread_is_new: 1,
      c5_chatmessage_thread_c5_chatmessage_id: replyInThreadDivElement,
    });
    if (result.success) {
      SocketInstance.emit('update', {'rooms': ChatRoomIDs, message: 'Posted new message!'});
      queryForFormUpdates(false);
      queryForThreadUpdates(replyInThreadDivElement);
      setData2({
        content: '',
      });
    }
  };

  const handleNewReactionAddClick = (c5_chatmessage_id, element, is_thread) => {
    let prefix = is_thread ? 'thrm' : 'cm';
    if (reactionDivOpen == prefix + '-' + c5_chatmessage_id) {
      setReactionDivOpen(false);
    } else {
      setReactionDivOpen(prefix + '-' + c5_chatmessage_id);
    }
    setReplyDivOpen(false);
    setContextDivOpen(false);
  };

  const handleCopyClick = async (c5_chatmessage_id, element, is_thread, text) => {
    let prefix = is_thread ? 'thrm' : 'cm';
    await navigator.clipboard.writeText(text);
    setCopiedOpen(prefix + '-' + c5_chatmessage_id);
  };

  const handleNewThumbsUpDownClick = (c5_chatmessage_id, element, is_thread, type) => {
    if (type == 'up') {
      handleNewReactionAssignClick(c5_chatmessage_id, 'U+1F44D', 'THUMBS UP SIGN', '👍');
    } else {
      handleNewReactionAssignClick(c5_chatmessage_id, 'U+1F44E', 'THUMBS DOWN SIGN', '👎');
    }
  };

  const handleNewReplyToClick = (c5_chatmessage_id, element, is_thread) => {
    let prefix = is_thread ? 'thrm' : 'cm';
    if (replyDivOpen == prefix + '-' + c5_chatmessage_id) {
      setReplyDivOpen(false);
    } else {
      setReplyDivOpen(prefix + '-' + c5_chatmessage_id);
    }
    setReactionDivOpen(false);
    setContextDivOpen(false);
  };

  const handleReplyInThreadClick = (c5_chatmessage_id) => {
    // hide small menu
    setReplyDivOpen(false);
    setReplyInThreadDivElement(c5_chatmessage_id);
    queryForThreadUpdates(c5_chatmessage_id);
    setTimeout(() => {
      const { top, height } = entireChatRef.current.getBoundingClientRect();
      setReplyInThreadDivHeight(height);
    }, 200);
  };

  const handleProcessByAIInThreadClick = async (c5_chatmessage_id) => {
    // hide small menu
    setReplyDivOpen(false);
    setReplyInThreadDivElement(c5_chatmessage_id);
    // mark for AI
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_UpdateMessageAI', {
      c5_chatmessage_c5_chat_id: ChatData.c5_chat_id,
      c5_chatmessage_id: c5_chatmessage_id,
    });
    // query for updates
    if (result.success) {
      queryForThreadUpdates(c5_chatmessage_id);
      setTimeout(() => {
        const { top, height } = entireChatRef.current.getBoundingClientRect();
        setReplyInThreadDivHeight(height);
      }, 200);
    }
  };

  const handleContextGlobalClick = () => {
    setContextGlobalOpen(!contextGlobalOpen);
  };

  const handleContextNumberClick = async (c5_chatmessage_id, is_thread) => {
    let prefix = is_thread ? 'thrm' : 'cm';
    if (contextDivOpen == prefix + '-' + c5_chatmessage_id) {
      setContextDivOpen(false);
      setContextValueLoaded(null);
    } else {
      setContextDivOpen(prefix + '-' + c5_chatmessage_id);
      setContextValueLoaded(null);
      // load context
      let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_GetContext', {
        c5_chatmessage_id: c5_chatmessage_id,
      });
      setContextValueLoaded(result.data);
    }
    setReactionDivOpen(false);
    setReplyDivOpen(false);
  };

  const handleNewReactionAssignClick = async (c5_chatmessage_id, index, name, emoji) => {
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_PostReaction', {
      c5_chatmessreaction_c5_chat_id: ChatData.c5_chat_id,
      c5_chatmessreaction_c5_chatmessage_id: c5_chatmessage_id,
      c5_chatmessreaction_um_user_id: ChatData.c5_chatuser_um_user_id,
      c5_chatmessreaction_sm_session_id: ChatData.c5_chatsession_sm_session_id,
      c5_chatmessreaction_um_user_name: ChatData.c5_chatuser_um_user_name ?? ChatData.c5_chatsession_um_user_name,
      c5_chatmessreaction_name: name,
      c5_chatmessreaction_icon: index,
      c5_chatmessreaction_emoji: emoji,
    });
    if (result.success) {
      queryForFormUpdates(false);
      queryForThreadUpdates(null);
    }
  };

  const renderReactionEmojisOptionGrouped = (c5_chatmessage_id) => {
    const listItems = EmojisOptionGrouped(false).map((value, index) => (
       <div key={'cem-' + index}>
        <b>{value['category']}:</b>
        <br/>
        {Object.values(value['options']).map((value2, index2) => (
          <ReactionSmallMenuA key={'cem2-' + index2} href={void(0)} onClick={() => handleNewReactionAssignClick(c5_chatmessage_id, value2['index'], value2['name'], value2['emoji'])} title={value2['name']}>
            {value2['emoji']}
          </ReactionSmallMenuA>
        ))}
        <hr class="no_margin" />
       </div>
    ));
    const favoritesItems = EmojisOptionGrouped(true).map((value, index) => (
       <div key={'cef-' + index}>
        {Object.values(value['options']).map((value2, index2) => (
          <ReactionSmallMenuA key={'cem2-' + index2} href={void(0)} onClick={() => handleNewReactionAssignClick(c5_chatmessage_id, value2['index'], value2['name'], value2['emoji'])} title={value2['name']}>
            {value2['emoji']}
          </ReactionSmallMenuA>
        ))}
        <hr class="no_margin" />
       </div>
    ));
    return (
      <>
        <div>
          {favoritesItems}
          {listItems}
        </div>
      </>
    );
  };

  const renderContextDivContainer = (c5_chatmessage_id, is_thread) => {
    let content = <img src="/assets/img/loading_color_50x18.gif" width="50" height="18" alt="Loading..."/>
    if (contextValueLoaded && contextValueLoaded.length > 0) {
      content = <>
        <table width="100%" className="table table-striped">
          <thead>
            <tr>
              <th>{loc('NF.Form.Type', 'Type')}</th>
              <th>{loc('NF.Form.Name', 'Name')}</th>
              <th>{loc('NF.Form.Value', 'Value')}</th>
            </tr>
          </thead>
          <tbody>
            {contextValueLoaded.map(value => {
              return (
                <tr>
                  <td>{value['tm_batchrecord_no_data_model_role_name']}</td>
                  <td>{value['tm_batchrecord_field_value_name']}</td>
                  <td>{value['tm_batchrecord_field_value_id'] ?? value['tm_batchrecord_field_value_code']}</td>
                </tr>
              );
            })}
          </tbody>
        </table>
      </>
    }
    return (
      <>
        {content}
      </>
    );
  };

  const renderMessageAttachements = (attachments, isImage) => {
    const listItems = attachments.map((attachment) => {
      if (isImage) {
        return (
          <>
            <div style={{ width: '100%' }}>
              <a href={attachment['file_url']} target="_blank" rel="noopener noreferrer">
                <img
                  src={attachment['file_url']}
                  alt={'Image'}
                  style={{ width: '100%', height: 'auto', display: 'block' }}
                />
              </a>
            </div>
          </>
        );
      }
      return (
        <>
          <a href={attachment['file_url']} target="_blank" rel="noopener noreferrer">
            <HTML.Icon tag="i" type="fa-solid fa-link" /> {attachment['file_name']}
          </a>
          <br/>
        </>
      );
    });
    return (
      <>
        {listItems}
      </>
    );
  };

  const extractDateOnly = (timestamp) => {
    let dateObj = new Date(timestamp);
    return (dateObj.getUTCFullYear()) + '-' + (dateObj.getMonth() + 1 + '').padStart(2, '0') + '-' + (dateObj.getDate() + '').padStart(2, '0');
  };

  const openSubFormTool = (value: any, force: boolean) => {
    const sessionStorageLink = 'c5_chat_' + ChatID + '_message_' + value['c5_chatmessage_id'] + '_form_tool_' + value['c5_chatmessage_form_settings_json']['link'];
    const saved = sessionStorage.getItem(sessionStorageLink);
    if (saved != '1' || force) {
      window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', value['c5_chatmessage_form_settings_json']['link'], {
        c5_chat_id: ChatID,
        um_user_id: ChatUserID,
        c5_chatmessage_id: value['c5_chatmessage_id'],
      });
      sessionStorage.setItem(sessionStorageLink, '1');
    }
  };

  const renderConversationRowsData = (data, is_thread) => {
    let last_date = '';
    let first_unread = false;
    let first_td_width = is_thread ? '6%' : '4%';
    let second_td_width = is_thread ? '94%' : '96%';
    let prefix = is_thread ? 'thrm' : 'cm';
    const listItems = data.map(value => {
      let dateRendered = null;
      let dateOnly = value['c5_chatmessage_inserted_date_formatted'];
      if (!last_date || dateOnly != last_date) {
        last_date = dateOnly;
        if (dateOnly == DateToday) {
          dateOnly = loc('NF.Form.Today', 'Today');
        } else if (dateOnly == DateYesterday) {
          dateOnly = loc('NF.Form.Yesterday', 'Yesterday');
        }
        dateRendered = <>
          <li key={'dm-' + value['c5_chatmessage_inserted_date_formatted']}>
            <table width="100%">
              <tr>
                <td width="45%"><hr/></td>
                <td width="10%" nowrap align="center">
                  <b>
                    {dateOnly}
                  </b>
                </td>
                <td width="45%"><hr/></td>
              </tr>
            </table>
          </li>
        </>;
      }
      // acknowledgement role method
      if (value['c5_chatmessage_no_data_model_role_code'] == 'acknowledgement') {
        // call form once
        let subFormToolLink;
        if (value['c5_chatmessage_is_form'] && value['c5_chatmessage_form_status_id'] == 10) {
          openSubFormTool(value, false);
          subFormToolLink = (
            <>
              {' '}&nbsp;&bull;&nbsp;{' '}
              <a href={void(0)} className="btn-link nf_chat_link_pointer" onClick={() => openSubFormTool(value, true)}>
                {loc('NF.Form.Open', 'Open')}
              </a>
            </>
          );
        } else if (value['c5_chatmessage_form_status_id'] == 20) {
          subFormToolLink = (
            <>
              {' '}&nbsp;&bull;&nbsp;{' '}
              {loc('NF.Form.Completed', 'Completed')}
            </>
          );
        }
        // return
        return (
          <>
            {dateRendered}
            <li key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash']}>
              <ScrollA id={'c5-' + prefix + '-id-' + value['c5_chatmessage_id'] + '-a'}></ScrollA>
              <table
                width="100%"
                id={'c5-' + prefix + '-id-' + value['c5_chatmessage_id']}
                data-c5_chatmessage_id={value['c5_chatmessage_id']}
                data-current_unread_c5_chatmessage_id={value['current_unread_c5_chatmessage_id']}
                data-c5_chatmessage_is_thread={value['c5_chatmessage_is_thread']}
                data-c5_chatmessage_thread_c5_chatmessage_id={value['c5_chatmessage_thread_c5_chatmessage_id']}
                data-c5_chatusrthrdunrd_unread_c5_chatmessage_id={value['c5_chatusrthrdunrd_unread_c5_chatmessage_id']}
                ref={el => unreadConversationsRef.current[value['c5_chatmessage_id']] = el}
              >
                {!first_unread && ((!value['c5_chatmessage_is_thread'] && (value['c5_chatmessage_id'] > value['c5_chatuser_unread_c5_chatmessage_id']))
                  || (!!value['c5_chatmessage_is_thread'] && (value['c5_chatmessage_id'] > value['c5_chatusrthrdunrd_unread_c5_chatmessage_id']))) && (
                  <>
                    {first_unread = true}
                    <tr>
                      <td width="100%" colspan="3">
                        <table width="100%">
                          <tr>
                            <td width="88%"><UnreadHr /></td>
                            <td width="2%">{' '}</td>
                            <td width="6%" align="right">
                              <UnreadB>
                                {loc('NF.Form.Unread', 'Unread')}
                              </UnreadB>
                            </td>
                            <td width="2%">{' '}</td>
                            <td width="2%"><UnreadHr /></td>
                          </tr>
                        </table>
                        <div ref={conversationMessageUnreadRef}>&nbsp;</div>
                      </td>
                    </tr>
                  </>
                )}
                <tr>
                  <td width={'100%'}>
                    <AknowledgementHolder className="nf_chat_acknowledgement_holder">
                      <table>
                        <tr>
                          <td>
                            <HTML.Tag
                              value={value['c5_chatmessage_message']}
                              have_html={true}
                              tag="div"
                              class="nf_chat_acknowledgement_message"
                            />
                          </td>
                          <td>
                            {subFormToolLink && (
                              subFormToolLink
                            )}
                          </td>
                        </tr>
                      </table>
                    </AknowledgementHolder>
                  </td>
                </tr>
              </table>
            </li>
          </>
        );
      }
      // regular messages
      return (
        <>
          {dateRendered}
          <li key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash']}>
            <ScrollA id={'c5-' + prefix + '-id-' + value['c5_chatmessage_id'] + '-a'}></ScrollA>
            <table
              width="100%"
              id={'c5-' + prefix + '-id-' + value['c5_chatmessage_id']}
              data-c5_chatmessage_id={value['c5_chatmessage_id']}
              data-current_unread_c5_chatmessage_id={value['current_unread_c5_chatmessage_id']}
              data-c5_chatmessage_is_thread={value['c5_chatmessage_is_thread']}
              data-c5_chatmessage_thread_c5_chatmessage_id={value['c5_chatmessage_thread_c5_chatmessage_id']}
              data-c5_chatusrthrdunrd_unread_c5_chatmessage_id={value['c5_chatusrthrdunrd_unread_c5_chatmessage_id']}
              ref={el => unreadConversationsRef.current[value['c5_chatmessage_id']] = el}
            >
              {!first_unread && ((!value['c5_chatmessage_is_thread'] && (value['c5_chatmessage_id'] > value['c5_chatuser_unread_c5_chatmessage_id']))
                || (!!value['c5_chatmessage_is_thread'] && (value['c5_chatmessage_id'] > value['c5_chatusrthrdunrd_unread_c5_chatmessage_id']))) && (
                <>
                  {first_unread = true}
                  <tr>
                    <td width="100%" colspan="3">
                      <table width="100%">
                        <tr>
                          <td width="88%"><UnreadHr /></td>
                          <td width="2%">{' '}</td>
                          <td width="6%" align="right">
                            <UnreadB>
                              {loc('NF.Form.Unread', 'Unread')}
                            </UnreadB>
                          </td>
                          <td width="2%">{' '}</td>
                          <td width="2%"><UnreadHr /></td>
                        </tr>
                      </table>
                      <div ref={conversationMessageUnreadRef}>&nbsp;</div>
                    </td>
                  </tr>
                </>
              )}
              <tr>
                <td rowspan="2" width={first_td_width} valign="top" align="center">
                  {!!value['c5_chatuser_photo_file_url'] && (
                    <ImgPhoto
                      src={value['c5_chatuser_photo_file_url']}
                      alt={value['c5_chatuser_um_user_name']}
                      title={value['c5_chatuser_um_user_name']}
                      width={50}
                      height={50}
                    />
                  )}
                  {!value['c5_chatuser_photo_file_url'] && (
                    <Avatar
                      name={value['c5_chatuser_um_user_name']}
                      colors={value['c5_chatuser_avatar_colors']}
                      title={value['c5_chatuser_um_user_name']}
                      last_seen={value['message_user_last_seen']}
                    />
                  )}
                </td>
                <td width={second_td_width}>
                  <UserSpan>
                    {value['c5_chatuser_um_user_name']}
                  </UserSpan>
                  {' '}
                  <TimestampSpan>
                    {value['c5_chatmessage_inserted_formatted']}
                  </TimestampSpan>
                </td>
              </tr>
              <tr>
                <td
                  key={prefix + '-' + value['c5_chatmessage_id'] + '-' + value['hash'] + '-message-td'}
                  width={second_td_width}
                >
                  <RenderMessageFullMemo
                    prefix={prefix}
                    value={value}
                  />
                </td>
              </tr>
              <tr>
                <td width={first_td_width}>&nbsp;</td>
                <td width={second_td_width}>
                  <table width="100%">
                    <tr>
                      <td align="left" width="100%">
                        <ReactionNewEmojiSpan onClick={(e) => handleNewReactionAddClick(value['c5_chatmessage_id'], e.target, is_thread)}>
                          <HTML.Icon tag="i" type="material-symbols-outlined light add_reaction" />
                        </ReactionNewEmojiSpan>
                        {!is_thread && (
                          <ReactionNewEmojiSpan onClick={(e) => handleNewReplyToClick(value['c5_chatmessage_id'], e.target, is_thread)}>
                            <HTML.Icon tag="i" type="material-symbols-outlined light quickreply" />
                          </ReactionNewEmojiSpan>
                        )}
                        <ReactionNewEmojiSpan onClick={(e) => handleNewThumbsUpDownClick(value['c5_chatmessage_id'], e.target, is_thread, 'up')}>
                          <HTML.Icon tag="i" type="material-symbols-outlined light thumb_up" />
                        </ReactionNewEmojiSpan>
                        <ReactionNewEmojiSpan onClick={(e) => handleNewThumbsUpDownClick(value['c5_chatmessage_id'], e.target, is_thread, 'down')}>
                          <HTML.Icon tag="i" type="material-symbols-outlined light thumb_down" />
                        </ReactionNewEmojiSpan>
                        {value['reactions_grouped'] && (
                          <>
                            <ReactionAddedSpan>
                              {value['reactions_grouped']}
                            </ReactionAddedSpan>
                          </>
                        )}
                        {!is_thread && value['c5_chatmessage_thread_reply_counter'] > 0 && (
                          <>
                            <>
                              {' '}&nbsp;&bull;&nbsp;{' '}
                            </>
                            <ThreadAddedSpan>
                              {value['c5_chatmessage_thread_reply_counter_users'].map(inner_value => {
                                return (
                                  <Avatar
                                    name={inner_value['name']}
                                    colors={inner_value['avatar_colors']}
                                    title={inner_value['name']}
                                    is_small={true}
                                  />
                                );
                              })}
                              {' '}
                              <ThreadAddedA href={void(0)} onClick={() => handleReplyInThreadClick(value['c5_chatmessage_id'])}>
                                {value['c5_chatmessage_thread_reply_counter_verbose']}
                              </ThreadAddedA>
                              {' '}
                              {!!value['c5_chatmessage_thread_reply_new_verbose'] && (
                                // todo add anchor to first new message
                                <ThreadAddedARed href={void(0)} onClick={() => handleReplyInThreadClick(value['c5_chatmessage_id'])}>
                                  {value['c5_chatmessage_thread_reply_new_verbose']}
                                </ThreadAddedARed>
                              )}
                            </ThreadAddedSpan>
                            {' '}
                          </>
                        )}
                        {value['c5_chatmessage_batch_context_counter'] > 0 && (
                          <>
                            <>
                              {' '}&nbsp;&bull;&nbsp;{' '}
                            </>
                            <ThreadAddedA href={void(0)} onClick={() => handleContextNumberClick(value['c5_chatmessage_id'], is_thread)}>
                              {loc('NF.Form.NumberInContext', '{number} in context', {"number": value['c5_chatmessage_batch_context_counter']})}
                            </ThreadAddedA>
                          </>
                        )}
                        <ReactionNewEmojiSpan onClick={(e) => handleCopyClick(value['c5_chatmessage_id'], e.target, is_thread, value['c5_chatmessage_message'])}>
                          <>
                            {' '}&nbsp;&bull;&nbsp;{' '}
                          </>
                          <HTML.Icon tag="i" type="material-symbols-outlined light content_copy" />
                          {copiedOpen == prefix + '-' + value['c5_chatmessage_id'] && (
                            <>
                              {loc('NF.Form.Copied', 'Copied!')}
                            </>
                          )}
                          {copiedOpen != prefix + '-' + value['c5_chatmessage_id'] && (
                            <>
                              {loc('NF.Form.Copy', 'Copy')}
                            </>
                          )}
                        </ReactionNewEmojiSpan>
                        <ReactionNewEmojiSpan>
                          <>
                            {' '}&nbsp;&bull;&nbsp;{' '}
                          </>
                          <HTML.Icon tag="i" type="material-symbols-outlined light 123" />
                          {value['hash'].slice(-6)}
                        </ReactionNewEmojiSpan>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" width="100%">
                        <div style={{ position: 'relative' }}>
                          {reactionDivOpen == prefix + '-' + value['c5_chatmessage_id'] && (
                            <>
                              <ReactionSmallMenuDiv ref={reactionSmallMenuRef}>
                                {renderReactionEmojisOptionGrouped(value['c5_chatmessage_id'])}
                              </ReactionSmallMenuDiv>
                            </>
                          )}
                          {replyDivOpen == prefix + '-' + value['c5_chatmessage_id'] && (
                            <>
                              <ReplySmallMenuDiv ref={replySmallMenuRef}>
                                <ReplySmallMenuDivA href={void(0)} onClick={() => handleReplyInThreadClick(value['c5_chatmessage_id'])}>
                                  <HTML.Icon tag="i" type="material-symbols-outlined light density_small" />
                                  {' '}
                                  {loc('NF.Form.ReplyInThread', 'Reply in thread')}
                                </ReplySmallMenuDivA>
                                <br />
                                <ReplySmallMenuDivA href={void(0)} onClick={() => handleProcessByAIInThreadClick(value['c5_chatmessage_id'])}>
                                  <HTML.Icon tag="i" type="material-symbols-outlined light mark_unread_chat_alt" />
                                  {' '}
                                  {loc('NF.Form.ProcessByAI', 'Process by AI')}
                                </ReplySmallMenuDivA>
                              </ReplySmallMenuDiv>
                            </>
                          )}
                          {contextDivOpen == prefix + '-' + value['c5_chatmessage_id'] && (
                            <>
                              <ContextSmallMenuDiv key={prefix + '-' + value['c5_chatmessage_id'] + '-context'}>
                                {renderContextDivContainer(value['c5_chatmessage_id'], is_thread)}
                              </ContextSmallMenuDiv>
                            </>
                          )}
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </li>
        </>
      );
    });
    first_unread = false;
    return (
      <>
        <ComponentConversationRowsUl>
          {listItems}
        </ComponentConversationRowsUl>
        <br/>
        <div ref={conversationMessageEndRef}>&nbsp;</div>
      </>
    );
  }

  const renderChatSessionData = () => {
    const listItems = chatSessionData.map(value => {
      return (
        <>
          <ChannelTr key={'cs-' + value['c5_chat_id']} $bold={value['c5_chat_uuid']==ChatUUID}>
            <td width="95%">
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={true} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    {value['c5_chat_name'] ? value['c5_chat_name'] : (
                      loc('NF.Form.ChatIDNumber', 'Chat # {number}', {
                        number: value['c5_chat_id']
                      })
                    )}
                  </ChannelA>
                  <ChannelJoin className="tw:float-right btn btn-link" href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    [{loc('NF.Form.Join', 'Join')}]
                  </ChannelJoin>
                </>
              )}
              {!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={!!value['c5_chatuser_unread_counter']} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid']}>
                    {value['c5_chat_name'] ? value['c5_chat_name'] : (
                      loc('NF.Form.ChatIDNumber', 'Chat # {number}', {
                        number: value['c5_chat_id']
                      })
                    )}
                  </ChannelA>
                </>
              )}
            </td>
            <td width="5%" align="right" $bold={!!value['c5_chatinvite_um_user_id']}>
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <Badge bg="danger">{value['c5_chatinvite_mentions_count']}</Badge>
                </>
              )}
              {(!value['c5_chatinvite_um_user_id'] && !!value['c5_chatuser_unread_counter']) && (
                <>
                  <Badge bg="danger">{value['c5_chatuser_unread_counter']}</Badge>
                </>
              )}
            </td>
          </ChannelTr>
        </>
      );
    });
    return (
      <>
        <table width="100%">
          {listItems}
        </table>
      </>
    );
  };

  const handleNewAIChatWindowClick = (type) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_chat_form', {
      c5_chatstarttype_code: type,
    });
  };

  const handleNewChannelChatWindowClick = (type) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_message_on_channel_form', {
      c5_chatdmtype_code: type,
    });
  };

  const handleNewChannelWindowClick = () => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_channel_form', {});
  };

  const handleNewGroupWindowClick = () => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_group_form', {});
  };

  const handleViewGroupsWindowClick = () => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_groups_list', {});
  };

  const handleNewDMWindowClick = () => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_dm_form', {});
  };

  const handleViewCanvasesWindowClick = () => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_canvases_list', {});
  }

  const handleNewCanvasWindowClick = (type) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_new_canvas_form', {
      c5_chatcanvas_c5_canvastype_code: type,
    });
  }

  const handleChangeAgentWindowClick = (c5_chat_id) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_change_agent_form', {
      c5_chat_id: c5_chat_id,
    });
  }

  const handleChangeAgentThreadWindowClick = (c5_chat_id, c5_chatmessage_id) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_change_thread_agent_form', {
      c5_chat_id: c5_chat_id,
      c5_chatmessage_id: c5_chatmessage_id,
    });
  }

  const handleChangeSignatureWindowClick = (c5_chat_id) => {
    let saved = localStorage.getItem('nf_chat_signature_um_usrsign_id');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_change_signature_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      c5_chatmessage_um_usrsign_id: saved ? parseInt(saved) : null,
    });
  }

  const handleChangeTermsWindowClick = (c5_chat_id) => {
    let saved = localStorage.getItem('nf_chat_terms_um_usrterm_id');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_change_terms_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      c5_chatmessage_um_usrterm_id: saved ? parseInt(saved) : null,
    });
  };

  const handleChangePromptsWindowClick = (c5_chat_id) => {
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_add_prompt_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      ai_prompt_existing_prompt: data.content,
      __run_uuid: RunUUID,
    });
  };

  const handleChangeImageWindowClick = (c5_chat_id) => {
    const saved = JSON.parse(localStorage.getItem('nf_chat_image_c5_chatmessage_image_settings_json') ?? '{}');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_add_image_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      ai_agent_code: saved['ai_agent_code'] ?? null,
      ai_imgsize_code: saved['ai_imgsize_code'] ?? null,
      ai_imgquality_code: saved['ai_imgquality_code'] ?? null,
    });
  };

  const handleChangeSoundWindowClick = (c5_chat_id) => {
    const saved = JSON.parse(localStorage.getItem('nf_chat_sound_c5_chatmessage_sound_settings_json') ?? '{}');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_add_sound_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      ai_agent_code: saved['ai_agent_code'] ?? null,
      ai_soundvoice_code: saved['ai_soundvoice_code'] ?? null,
    });
  };

  const handleChangeTranscriptWindowClick = (c5_chat_id) => {
    const saved = JSON.parse(localStorage.getItem('nf_chat_transcript_c5_chatmessage_transcript_settings_json') ?? '{}');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_add_transcript_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      ai_agent_code: saved['ai_agent_code'] ?? null,
    });
  };

  const handleChangeRAGWindowClick = (c5_chat_id) => {
    const saved = JSON.parse(localStorage.getItem('nf_chat_rag_c5_chatmessage_rag_settings_json') ?? '{}');
    window.Numbers.Form.openSubformWindow('', '', 'c5_chat_standalone_form', 'c5_chat_standalone_add_rag_form', {
      c5_chat_id: c5_chat_id,
      um_user_id: ChatUserID,
      ai_ragtype_code: saved['ai_ragtype_code'] ?? null,
    });
  };

  const renderChatChannelsData = () => {
    const listItems = chatChannelData.map(value => {
      return (
        <>
          <ChannelTr key={'chan-' + value['c5_chatchannel_code']} $bold={value['c5_chat_uuid']==ChatUUID}>
            <td width="95%">
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={true} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    {value['c5_chatchannel_icon'] ? (
                      <HTML.Icon tag="i" type={value['c5_chatchannel_icon']} />
                    ) : (
                      <HTML.Icon tag="i" type="fas fa-hashtag" />
                    )}
                    {' '}
                    {value['channel_mention_short']}
                  </ChannelA>
                  <ChannelJoin className="tw:float-right btn btn-link" href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    [{loc('NF.Form.Join', 'Join')}]
                  </ChannelJoin>
                </>
              )}
              {!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={!!value['c5_chatuser_unread_counter']} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid']}>
                    {value['c5_chatchannel_icon'] ? (
                      <HTML.Icon tag="i" type={value['c5_chatchannel_icon']} />
                    ) : (
                      <HTML.Icon tag="i" type="fas fa-hashtag" />
                    )}
                    {' '}
                    {value['channel_mention_short']}
                  </ChannelA>
                </>
              )}
            </td>
            <td width="5%" align="right" $bold={!!value['c5_chatinvite_um_user_id']}>
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <Badge bg="danger">{value['c5_chatinvite_mentions_count']}</Badge>
                </>
              )}
              {(!value['c5_chatinvite_um_user_id'] && !!value['c5_chatuser_unread_counter']) && (
                <>
                  <Badge bg="danger">{value['c5_chatuser_unread_counter']}</Badge>
                </>
              )}
            </td>
          </ChannelTr>
        </>
      );
    });
    return (
      <>
        <table width="100%">
          {listItems}
        </table>
      </>
    );
  };

  const renderChatDirectMessagesAvatarUsers = (users, chat_id) => {
    const listItems = Object.values(users).map(value => {
      if (value['current_user']) {
        return null;
      }
      return (
        <>
          {' '}
          <Avatar
            name={value['name']}
            colors={value['avatar_colors']}
            title={value['name']}
            last_seen={value['last_seen']}
            is_small={true}
          />
          {' '}
          {value['name']}
        </>
      );
    });
    const listTooltips = Object.values(users).map(value => {
      return (
        <>
          <Avatar
            name={value['name']}
            colors={value['avatar_colors']}
            title={value['name']}
            last_seen={value['last_seen']}
            is_small={true}
          />
          {' '}
          {value['name']}
          <br/>
        </>
      );
    });
    return (
      <>
        <OverlayTrigger placement="right" overlay={
          <Tooltip id={'tooltip-dm-' + chat_id}>
            {listTooltips}
          </Tooltip>
        }>
          <span>{listItems}</span>
        </OverlayTrigger>
      </>
    );
  };

  const renderChatDirectMessagesData = () => {
    const listItems = chatDirectMessageData.map(value => {
      return (
        <>
          <ChannelTr key={'dmes-' + value['c5_chat_uuid']} $bold={value['c5_chat_uuid']==ChatUUID}>
            <td width="95%">
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={true} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    <Avatar
                      name={value['c5_avatar_string_all'][0]['name']}
                      colors={value['c5_avatar_string_all'][0]['avatar_colors']}
                      title={value['c5_avatar_string_all'][0]['name']}
                      last_seen={value['c5_avatar_string_all'][0]['last_seen']}
                      is_small={true}
                    />
                    {' '}
                    {renderChatDirectMessagesAvatarUsers(value['c5_avatar_string_all'], value['c5_chat_id'])}
                  </ChannelA>
                  <ChannelJoin className="tw:float-right btn btn-link" href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid'] + '&c5_chat_id=' + value['c5_chat_id'] + '&c5_chatinvite_um_user_id=' + value['c5_chatinvite_um_user_id']}>
                    [{loc('NF.Form.Join', 'Join')}]
                  </ChannelJoin>
                </>
              )}
              {!value['c5_chatinvite_um_user_id'] && (
                <>
                  <ChannelA $bold={!!value['c5_chatuser_unread_counter']} href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + value['c5_chat_uuid']}>
                    {renderChatDirectMessagesAvatarUsers(value['c5_avatar_string_all'], value['c5_chat_id'])}
                  </ChannelA>
                </>
              )}
            </td>
            <td width="5%" align="right" $bold={!!value['c5_chatinvite_um_user_id']}>
              {!!value['c5_chatinvite_um_user_id'] && (
                <>
                  <Badge bg="danger">{value['c5_chatinvite_mentions_count']}</Badge>
                </>
              )}
              {(!value['c5_chatinvite_um_user_id'] && !!value['c5_chatuser_unread_counter']) && (
                <>
                  <Badge bg="danger">{value['c5_chatuser_unread_counter']}</Badge>
                </>
              )}
            </td>
          </ChannelTr>
        </>
      );
    });
    return (
      <>
        <table width="100%">
          {listItems}
        </table>
      </>
    );
  };

  const renderContextGlobalContainer = (context) => {
    return (
      <>
        <table className="table table-striped">
          <thead>
            <tr>
              <th>{loc('NF.Form.Name', 'Name')}</th>
              <th>{loc('NF.Form.Value', 'Value')}</th>
            </tr>
          </thead>
          <tbody>
            {context.map(value => {
              return (
                <tr>
                  <td>{value['tm_batchrecord_field_name']}</td>
                  <td>
                    {value['tm_batchrecord_field_value_id'] ?? value['tm_batchrecord_field_value_code']}
                    {' - '}
                    {value['tm_batchrecord_field_value_name']}
                    {' ('}{value['tm_batchrecord_no_data_model_role_name']}{')'}
                  </td>
                </tr>
              );
            })}
          </tbody>
        </table>
      </>
    );
  };

  const renderChatChatData = () => {
    const listItems = Object.values(chatChatData.c5_avatar_string_all ?? {}).map(value => {
      return (
        <>
          {!!value['photo_file_url'] && (
            <ImgPhoto
              src={value['photo_file_url']}
              alt={value['name']}
              title={value['name']}
              width={32}
              height={32}
            />
          )}
          {!value['photo_file_url'] && (
            <Avatar
              name={value['name']}
              colors={value['avatar_colors']}
              title={value['name']}
              last_seen={value['last_seen']}
            />
          )}
        </>
      );
    });
    return (
      <>
        <table width="100%">
          <tr key={'cusr-row'}>
            <td align="left" width="25%">
              {!!chatChatData.c5_chatchannel_mention && (
                <>
                  {chatChatData.c5_chatchannel_mention}
                  {' - '}
                </>
              )}
              {chatChatData.c5_chat_c5_chattype_code == 'GENERAL' && (
                <>
                  {chatChatData.c5_chat_name}
                  {' - '}
                </>
              )}
              {!!chatChatData.c5_chattype_name_translated && (
                <>
                  <TypeI>
                    {chatChatData.c5_chattype_name_translated}
                  </TypeI>
                </>
              )}
              {!!chatContextData && (
                <>
                  <>
                    {' '}&nbsp;&bull;&nbsp;{' '}
                  </>
                  <ThreadAddedA href={void(0)} onClick={() => handleContextGlobalClick()}>
                    {loc('NF.Form.Context', 'Context')}
                  </ThreadAddedA>
                  {contextGlobalOpen && (
                    <>
                      <div style={{position: 'relative'}}>
                        <ContextSmallMenuDiv key={'context-global'}>
                          {renderContextGlobalContainer(chatContextData)}
                        </ContextSmallMenuDiv>
                      </div>
                    </>
                  )}
                </>
              )}
            </td>
            <td align="left" width="50%">
              {!!canvasesData && (
                <>
                  {renderCanvasesData()}
                </>
              )}
            </td>
            <td align="right" width="25%">
              {listItems}
            </td>
          </tr>
        </table>
      </>
    );
  };

  const renderCanvasesData = () => {
    const itemList = Object.values(canvasesData).map(item => {
      return (
        <>
          {renderCanvasesOneDropdown(item)}
        </>
      );
    });
    return (
      <>
        {itemList}
      </>
    );
  };

  const renderCanvasesOneDropdown = (inner) => {
    const itemList = Object.values(inner).map(item => {
      const icon = item['c5_chatcanvas_icon'] ? <HTML.Icon tag="i" type={item['c5_chatcanvas_icon']} /> : null;
      return (
        <>
          {item['c5_chatcanvas_c5_canvastype_code'] == 'LINK' && (
            <Dropdown.Item eventKey={item['c5_chatcanvas_name']} href={item['c5_chatcanvas_link_url']}>
              {icon} {item['c5_chatcanvas_name']}
            </Dropdown.Item>
          )}
          {item['c5_chatcanvas_c5_canvastype_code'] == 'CANVAS' && (
            <Dropdown.Item eventKey={item['c5_chatcanvas_name']} onClick={() => {
              setCanvasesModalData({
                title: item['c5_chatcanvas_name'],
                content: item['c5_chatcanvas_html_wysiwyg'],
              });
              setCanvasesModalShow(true);
            }}>
              {icon} {item['c5_chatcanvas_name']}
            </Dropdown.Item>
          )}
          {item['c5_chatcanvas_c5_canvastype_code'] == 'LIST' && (
            <Dropdown.Item eventKey={item['c5_chatcanvas_name']} onClick={() => {
              setCanvasesModalData({
                title: item['c5_chatcanvas_name'],
                content: item['c5_chatcanvas_html_wysiwyg'],
                list: item['c5_chatcanvas_list'] ?? {},
              });
              setCanvasesModalShow(true);
            }}>
              {icon} {item['c5_chatcanvas_name']}
            </Dropdown.Item>
          )}
        </>
      );
    });
    const firstKey = Object.keys(inner)[0];
    return (
      <>
        <DropdownButton
          as={ButtonGroup}
          key={inner[firstKey]['c5_chatcanvsmap_tab']}
          variant={'secondary'}
          title={inner[firstKey]['c5_chatcanvsmap_tab']}
        >
          {itemList}
        </DropdownButton>
      </>
    );
  };

  const renderCanvasListData = (list) => {
    const itemList = Object.values(list).map(item => {
      const firstKey = Object.keys(item)[0];
      const itemInner = Object.values(item).map(inner => {
        return (
          <>
            <tr>
              <td width="2%" valign="top" align="left">
                <input
                  type="checkbox"
                  value="1"
                  checked={!!inner['c5_chatcanvslstuser_um_user_id'] ? true : false}
                  onClick={(event) => queryForCanvasesUpdateOneRecord(inner['c5_chatcanvslist_id'], inner['c5_chatcanvslist_c5_chatcanvas_code'], event.target.checked)} />
              </td>
              <td width="98%" valign="top" align="left">
                {inner['c5_chatcanvslist_name']}
                {!!inner['c5_chatcanvslist_description'] && (
                  <>
                    <br />
                    {inner['c5_chatcanvslist_description']}
                  </>
                )}
              </td>
            </tr>
          </>
        );
      });
      return (
        <li>
          <h6>{item[firstKey]['c5_chatcanvslist_group']}</h6>
          <table width="100%">
            {itemInner}
          </table>
        </li>
      );
    });
    return (
      <>
        <ul>
          {itemList}
        </ul>
      </>
    );
  };

  const handleChatFileChange = (event: any) => {
    setFileChatInputCount(event.target.files.length > 0 ? event.target.files.length : null);
    if (event.target.files.length > 0) {
      setFileChatInputFiles(Array.from(event.target.files));
      setFileChatInputError(null);
    } else {
      setFileChatInputFiles(null);
    }
  };

  const handleThreadFileChange = (event: any) => {
    setFileThreadInputCount(event.target.files.length > 0 ? event.target.files.length : null);
    if (event.target.files.length > 0) {
      setFileThreadInputFiles(Array.from(event.target.files));
    } else {
      setFileThreadInputFiles(null);
    }
  };

  const handleSignatureToggle = (checked: any) => {
    localStorage.setItem('nf_chat_signature_enabled', checked ? '1' : '0');
    setSignatureToggle(checked);
  };

  const handleTermsToggle = (checked: any) => {
    localStorage.setItem('nf_chat_terms_enabled', checked ? '1' : '0');
    setTermsToggle(checked);
  };

  const handleRagToggle = (checked: any) => {
    localStorage.setItem('nf_chat_rag_enabled', checked ? '1' : '0');
    setRagToggle(checked);
  }

  const handleImageToggle = (checked: any) => {
    localStorage.setItem('nf_chat_image_enabled', checked ? '1' : '0');
    if (checked) {
      handleSoundToggle(false);
      handleTranscriptToggle(false);
    }
    setImageGenerationToggle(checked);
  };

  const handleSoundToggle = (checked: any) => {
    localStorage.setItem('nf_chat_sound_enabled', checked ? '1' : '0');
    if (checked) {
      handleImageToggle(false);
      handleTranscriptToggle(false);
    }
    setSoundGenerationToggle(checked);
  };

  const handleTranscriptToggle = (checked: any) => {
    localStorage.setItem('nf_chat_transcript_enabled', checked ? '1' : '0');
    if (checked) {
      handleImageToggle(false);
      handleSoundToggle(false);
    }
    setTranscriptGenerationToggle(checked);
    // trigger to upload image
    if (checked) {
      // we add generic prompt instructions
      if (!data.content || data.content == '<p></p>') {
        setData({
          content: '<p>Transcribe audio file and provide transcript.</p>',
        });
      }
      // we force upload mp3
      fileChatInputRef.current.accept = 'audio/mpeg,audio/wav,audio/mp4,audio/webm';
      fileChatInputRef.current.click();
      setFileChatInputError(null);
    } else {
      fileChatInputRef.current.accept = undefined;
      setFileChatInputError(null);
    }
  };

  const handleNoAIToggle = async (checked: any) => {
    setNoAIChanged(true);
    let result = await RequestAPIPost('/API/V1/C5/ChatMessages/_PostNoAI', {
      c5_chat_id: ChatID,
      c5_chat_no_ai: checked ? 0 : 1,
    });
    setNoAIToggle(!checked);
  };

  return (
    <>
      <Row className="tw:gx-0 tw:gy-1 tw:text-left tw:divide-x-1 tw:divide-gray-200">
        <Col key={1} lg={3} md={3}>
          <LeftBarHolder>
            <table width="100%">
              <tr>
                <td width="90%" align="left">
                  <HTML.Icon tag="i" type="material-symbols-outlined light new_window" />
                  {' '}
                  <ChannelsLabel>{loc('NF.Form.SessionsColon', 'Sessions:')}</ChannelsLabel>
                </td>
                <td width="10%" align="right">
                  {AclCan.CreateChatMessages && (
                    <>
                      <a href={void(0)} className="btn btn-link" onClick={() => handleNewAIChatWindowClick('AI')}>
                        <HTML.Icon tag="b" type="fas fa-plus-square" />
                      </a>
                    </>
                  )}
                </td>
              </tr>
              <tr>
                <td colspan="2" align="left" width="100%">
                  {chatSessionData.length > 0 && renderChatSessionData()}
                </td>
              </tr>
            </table>
            <hr/>
            <table width="100%">
              <tr>
                <td width="90%" align="left">
                  <HTML.Icon tag="i" type="material-symbols-outlined light move_group" />
                  {' '}
                  <ChannelsLabel>{loc('NF.Form.ChannelsColon', 'Channels:')}</ChannelsLabel>
                </td>
                <td width="10%" align="right">
                  {AclCan.CreateChatChannels && (
                    <>
                      <a href={void(0)} className="btn btn-link" onClick={() => handleNewChannelWindowClick()}>
                        <HTML.Icon tag="b" type="fas fa-plus-square" />
                      </a>
                    </>
                  )}
                </td>
              </tr>
              <tr>
                <td colspan="2" align="left" width="100%">
                  {chatChannelData.length > 0 && renderChatChannelsData()}
                </td>
              </tr>
            </table>
            <hr/>
            <table width="100%">
              <tr>
                <td width="90%" align="left">
                  <HTML.Icon tag="i" type="material-symbols-outlined light contacts_product" />
                  {' '}
                  <ChannelsLabel>{loc('NF.Form.DirectMessagesColon', 'Direct Messages:')}</ChannelsLabel>
                </td>
                <td width="10%" align="right">
                  {AclCan.CreateChatDirectMessages && (
                    <>
                      <a href={void(0)} className="btn btn-link" onClick={() => handleNewDMWindowClick()}>
                        <HTML.Icon tag="b" type="fas fa-plus-square" />
                      </a>
                    </>
                  )}
                </td>
              </tr>
              <tr>
                <td colspan="2" align="left" width="100%">
                  {chatDirectMessageData.length > 0 && renderChatDirectMessagesData()}
                </td>
              </tr>
            </table>
          </LeftBarHolder>
        </Col>
        {ChatUUID ? (
          <>
            <Col key={2} lg={9} md={9} ref={entireChatRef} className="tw:gx-0 tw:gy-1 tw:text-left tw:divide-y-1 tw:divide-gray-200">
              <ReplyInThreadHolderDiv style={{height: replyInThreadDivHeight + 'px', display: replyInThreadDivElement ? 'block' : 'none'}}>
                <Row className="tw:gx-0 tw:gy-1 tw:text-left tw:divide-y-1 tw:divide-gray-200" style={{paddingLeft: '1em', paddingRight: '1em'}}>
                  <Col key={'2-1'} lg={6} md={6}>
                    <h6>
                      {loc('NF.Form.Thread', 'Thread')}
                      {' '}
                      <ChannelA href={'/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat?c5_chat_uuid=' + ChatUUID + '#c5-cm-id-' + replyInThreadDivElement + '-a'}>
                        #{replyInThreadDivElement}
                      </ChannelA>
                    </h6>
                  </Col>
                  <Col key={'2-2'} lg={6} md={6}>
                    <button type="button" class="btn-close tw:float-right" onClick={() => setReplyInThreadDivElement(null)}></button>
                  </Col>
                </Row>
                <table width="100%">
                  <tr>
                    <td colspan="2">
                      <Row ref={conversationListHolderRef} style={{height: conversationListHolderHeight + 'px', paddingLeft: '1em', paddingRight: '1em'}}>
                        <Col ref={conversationRowsRef} key={3} lg={12} md={12} style={{overflowY: 'scroll', height: '100%'}}>
                          {conversationLastMessageID && renderConversationRowsData(replyRowsData, true)}
                        </Col>
                      </Row>
                    </td>
                  </tr>
                </table>
                <Row>
                  <Col key={6} lg={12} md={12} style={{paddingLeft: '1em', paddingRight: '1em', overflowX: 'scroll'}}>
                    <table width="100%" style={{backgroundColor: '#fff'}}>
                      <tr>
                        <td width="100%">
                          {editableElements2}
                        </td>
                      </tr>
                      <tr style={{display: replyToolbarElementOpen ? 'block' : 'none'}}>
                        <td width="100%">
                          {toolbarElement2}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input
                            type="file"
                            ref={fileThreadInputRef}
                            style={{ display: "none" }}
                            onChange={handleThreadFileChange}
                            multiple
                          />
                        </td>
                      </tr>
                      <tr>
                        <td width="100%">
                          <button className="btn btn-primary" type="button" onClick={() => {handleReplyThreadSubmitClick(data2);}}>
                            {loc('NF.Form.Post', 'Post')}
                          </button>
                          <a className="btn btn-light tw:underline" onClick={() => {setReplyToolbarElementOpen(!replyToolbarElementOpen)}}>
                            {loc('NF.Form.Text', 'Text')}
                          </a>
                          <a className="btn btn-light tw:underline" onClick={() => {handleChangeAgentThreadWindowClick(ChatID, replyInThreadDivElement)}}>
                            {loc('NF.Form.AI', 'AI')}
                          </a>
                          <a className="btn btn-light tw:underline" onClick={() => {fileThreadInputRef.current.click()}}>
                            {loc('NF.Form.Upload', 'Upload')}
                            {fileThreadInputCount && (
                              <>
                                <span>
                                  {' '}
                                  <Badge bg="primary">{fileThreadInputCount}</Badge>
                                </span>
                              </>
                            )}
                          </a>
                          {' '}
                          <HTML.Tag value={loc('NF.Form.CmdEnterOrCtrlEnterToSendMessage', '<b>Cmd + Enter</b> or <b>Ctrl + Enter</b> to send message.')} have_html={true} tag="span" />
                        </td>
                      </tr>
                    </table>
                  </Col>
                </Row>
              </ReplyInThreadHolderDiv>
              {!!chatChatData && (
                <>
                  <Row>
                    <Col key={4} lg={12} md={12}>
                      {renderChatChatData()}
                    </Col>
                  </Row>
                </>
              )}
              <div style={{position: 'relative'}}>
                <Row ref={conversationListHolderRef} style={{height: conversationListHolderHeight + 'px'}}>
                  <Col ref={conversationRowsRef} key={3} lg={12} md={12} style={{overflowY: 'scroll', height: '100%'}}>
                    {conversationLastMessageID && renderConversationRowsData(conversationRowsData, false)}
                  </Col>
                </Row>
                <Row>
                  <Col key={3} lg={12} md={12}>
                    <table width="100%">
                      <tr>
                        <td width="100%">
                          {browserSupportsSpeechRecognition && (
                            <>
                              <MicrophoneSpeechDiv className="btn btn-link" onClick={() => {
                                if (!speechChatToggle) {
                                  setSpeechChatToggle(true);
                                  SpeechRecognition.startListening();
                                } else {
                                  setSpeechChatToggle(false);
                                  SpeechRecognition.stopListening();
                                  setData({
                                    content: data.content + '<p>' + transcript + '</p>',
                                  });
                                  resetTranscript();
                                }
                              }}>
                                {!speechChatToggle && (
                                  <HTML.Icon tag="i" type="fa-solid fa-microphone" />
                                )}
                                {speechChatToggle && (
                                  <HTML.Icon tag="i" type="fa-solid fa-ear-listen" />
                                )}
                              </MicrophoneSpeechDiv>
                            </>
                          )}
                          {!browserSupportsSpeechRecognition && (
                            <>
                              <MicrophoneSpeechDiv className="btn btn-link" style={{color: 'red'}}>
                                <HTML.Icon tag="i" type="fa-solid fa-microphone-slash" />
                              </MicrophoneSpeechDiv>
                            </>
                          )}
                          <EditableElementsDiv>
                            {editableElements}
                          </EditableElementsDiv>
                        </td>
                      </tr>
                      <tr style={{display: toolbarElementOpen ? 'block' : 'none'}}>
                        <td width="100%">
                          {toolbarElement}
                        </td>
                      </tr>
                      <tr style={{ display: "none" }}>
                        <td>
                          <input
                            type="file"
                            ref={fileChatInputRef}
                            onChange={handleChatFileChange}
                            multiple
                          />
                          <input {...fileChatGetInputProps()} />
                        </td>
                      </tr>
                      <tr>
                        <td width="100%">
                          <button className="btn btn-primary" type="button" onClick={() => {handleSubmitClick(data);}}>
                            {loc('NF.Form.Post', 'Post')}
                          </button>
                          <a className="btn btn-light tw:underline nf_chat_button_helper" onClick={() => {setToolbarElementOpen(!toolbarElementOpen)}}>
                            {loc('NF.Form.Aa', 'Aa')}
                          </a>
                          <a className="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={!noAIToggle} onChange={(e) => {
                              handleNoAIToggle(e.target.checked)
                            }} />
                            {' '}
                            <span class="tw:underline" onClick={() => {handleNoAIToggle(!noAIToggle)}}>
                              {loc('NF.Form.AI', 'AI')}
                            </span>
                          </a>
                          {/*}
                          <a className="btn btn-light tw:underline" onClick={() => {handleChangeAgentWindowClick(ChatID)}}>
                            {loc('NF.Form.AI', 'AI')}
                          </a>
                          */}
                          <div className="btn btn-light nf_chat_button_helper">
                            <div {...fileChatGetRootProps()}
                              style={{
                                display: 'inline-block',
                                color: fileChatIsDragActive ? 'red' : 'inherit'
                              }}
                            >
                              {!fileChatIsDragActive && (
                                <>
                                  <span
                                    class="tw:underline"
                                    onClick={(e) => {
                                      e.stopPropagation();
                                      e.preventDefault();
                                      fileChatInputRef.current.click();
                                    }}
                                  >
                                    {loc('NF.Form.Upload', 'Upload')}
                                  </span>
                                </>
                              )}
                              {fileChatIsDragActive && (
                                <>
                                  {loc('NF.Form.DropHere', 'Drop here')}
                                </>
                              )}
                            </div>
                            {fileChatInputCount && fileChatInputCount <= 30 && (
                              <>
                                {' '}
                                <Badge bg="primary">{fileChatInputCount}</Badge>
                              </>
                            )}
                            {fileChatInputCount && fileChatInputCount > 30 && (
                              <>
                                {' '}
                                <span>
                                  <Badge bg="danger">{loc('NF.Form.Max30', 'Max 30')}</Badge>
                                </span>
                              </>
                            )}
                            {!!fileChatInputError && (
                              <>
                                {' '}
                                <span>
                                  <Badge bg="danger">{fileChatInputError}</Badge>
                                </span>
                              </>
                            )}
                          </div>
                          <div class="btn btn-light nf_chat_button_helper" onClick={(e) => {
                            setDeepLearningToggle(!deepLearningToggle);
                          }}>
                            <HTML.Input type="checkbox" checked={deepLearningToggle} onChange={(e) => {
                              setDeepLearningToggle(e.target.checked)
                            }} />
                            {' '}
                            <span class="tw:underline">
                              {loc('NF.Form.Think', 'Think')}
                            </span>
                          </div>
                          <div class="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={imageGenerationToggle} onChange={(e) => handleImageToggle(e.target.checked)} />
                            {' '}
                            <span class="tw:underline" onClick={() => handleChangeImageWindowClick(ChatID)}>
                              {loc('NF.Form.Image', 'Image')}
                            </span>
                          </div>
                          <div class="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={soundGenerationToggle} onChange={(e) => handleSoundToggle(e.target.checked)} />
                            {' '}
                            <span class="tw:underline" onClick={() => handleChangeSoundWindowClick(ChatID)}>
                              {loc('NF.Form.Sound', 'Sound')}
                            </span>
                          </div>
                          <div class="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={transcriptGenerationToggle} onChange={(e) => handleTranscriptToggle(e.target.checked)} />
                            {' '}
                            <span class="tw:underline" onClick={() => handleChangeTranscriptWindowClick(ChatID)}>
                              {loc('NF.Form.Transcript', 'Transcript')}
                            </span>
                          </div>
                          <div class="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={signatureToggle} onChange={(e) => handleSignatureToggle(e.target.checked)} />
                            {' '}
                            <span class="tw:underline" onClick={() => handleChangeSignatureWindowClick(ChatID)}>
                              {loc('NF.Form.Signature', 'Signature')}
                            </span>
                          </div>
                          <div class="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={termsToggle} onChange={(e) => handleTermsToggle(e.target.checked)} />
                            {' '}
                            <span class="tw:underline" onClick={() => handleChangeTermsWindowClick(ChatID)}>
                              {loc('NF.Form.Terms2', 'Terms')}
                            </span>
                          </div>
                          <a className="btn btn-light nf_chat_button_helper">
                            <HTML.Input type="checkbox" checked={ragToggle} onChange={(e) => {
                              handleRagToggle(e.target.checked)
                            }} />
                            {' '}
                            <span class="tw:underline" onClick={() => {handleChangeRAGWindowClick(ChatID)}}>
                              {loc('NF.Form.RAG', 'RAG')}
                            </span>
                            {!!ragChatInputError && (
                              <>
                                {' '}
                                <span>
                                  <Badge bg="danger">{ragChatInputError}</Badge>
                                </span>
                              </>
                            )}
                          </a>
                          <div class="btn btn-light nf_chat_button_helper">
                            <span class="tw:underline" onClick={() => handleChangePromptsWindowClick(ChatID)}>
                              {loc('NF.Form.Prompts', 'Prompts')}
                            </span>
                          </div>
                          {' '}
                          <br/>
                          <HTML.Tag value={loc('NF.Form.CmdEnterOrCtrlEnterToSendMessage', '<b>Cmd + Enter</b> or <b>Ctrl + Enter</b> to send message.')} have_html={true} tag="span" />
                        </td>
                      </tr>
                    </table>
                  </Col>
                </Row>
                <MaskOverlayDiv style={{display: replyInThreadDivElement ? 'block': 'none'}}>
                  {' '}
                </MaskOverlayDiv>
              </div>
            </Col>
          </>
        ) : (
          <Col key={2} lg={9} md={9} className="tw:gx-0 tw:gy-1 tw:text-left tw:divide-y-1 tw:divide-gray-200">
            <Row>
              <Col key={3} lg={12} md={12}>
                <h4>{loc('NF.Form.CreateNewChatColon', 'Create new chat:')}</h4>
                <ul>
                  <li>
                    <a href={void(0)} className="btn btn-link" onClick={() => handleNewAIChatWindowClick('AI')}>
                      <HTML.Icon tag="i" type="material-symbols-outlined light new_window" />
                      {' '}
                      {loc('NF.Form.ChatWithArtificialIntelligence', 'Chat with Artificial Intelligence')}
                    </a>
                  </li>
                  <li>
                    <a href={void(0)} className="btn btn-link" onClick={() => handleNewChannelChatWindowClick('CM')}>
                      <HTML.Icon tag="i" type="material-symbols-outlined light move_group" />
                      {' '}
                      {loc('NF.Form.NewChannelMessage', 'New Channel Message')}
                    </a>
                  </li>
                  <li>
                    <a href={void(0)} className="btn btn-link" onClick={() => handleNewDMWindowClick()}>
                      <HTML.Icon tag="i" type="material-symbols-outlined light contacts_product" />
                      {' '}
                      {loc('NF.Form.NewDirectMessage', 'New Direct Message')}
                    </a>
                  </li>
                </ul>
                {AclCan.CreateChatChannels && (
                  <>
                    <h4>{loc('NF.Form.CreateNewChannelColon', 'Create new channel:')}</h4>
                    <ul>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleNewChannelWindowClick()}>
                          <HTML.Icon tag="i" type="material-symbols-outlined light move_group" />
                          {' '}
                          {loc('NF.Form.NewChannel', 'New Channel')}
                        </a>
                      </li>
                    </ul>
                  </>
                )}
                {AclCan.CreateChatGroups && (
                  <>
                    <h4>{loc('NF.Form.CreateNewGroupColon', 'Create new group:')}</h4>
                    <ul>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleNewGroupWindowClick()}>
                          <HTML.Icon tag="i" type="far fa-object-group" />
                          {' '}
                          {loc('NF.Form.NewGroup', 'New Group')}
                        </a>
                      </li>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleViewGroupsWindowClick()}>
                          <HTML.Icon tag="i" type="far fa-object-group" />
                          {' '}
                          {loc('NF.Form.ViewGroups', 'View Groups')}
                        </a>
                      </li>
                    </ul>
                  </>
                )}
                {AclCan.CreateChatCanvases && (
                  <>
                    <h4>{loc('NF.Form.CreateNewCanvasColon', 'Create new canvas:')}</h4>
                    <ul>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleNewCanvasWindowClick('CANVAS')}>
                          <HTML.Icon tag="i" type="fas fa-cube" />
                          {' '}
                          {loc('NF.Form.NewCanvas', 'New Canvas')}
                        </a>
                      </li>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleNewCanvasWindowClick('LINK')}>
                          <HTML.Icon tag="i" type="fas fa-cube" />
                          {' '}
                          {loc('NF.Form.NewLink', 'New Link')}
                        </a>
                      </li>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleNewCanvasWindowClick('LIST')}>
                          <HTML.Icon tag="i" type="fas fa-cube" />
                          {' '}
                          {loc('NF.Form.NewList', 'New List')}
                        </a>
                      </li>
                      <li>
                        <a href={void(0)} className="btn btn-link" onClick={() => handleViewCanvasesWindowClick()}>
                          <HTML.Icon tag="i" type="fas fa-cube" />
                          {' '}
                          {loc('NF.Form.ViewCanvases', 'View Canvases')}
                        </a>
                      </li>
                    </ul>
                  </>
                )}
              </Col>
            </Row>
          </Col>
        )}
      </Row>
      <Modal show={canvasesModalShow} size="xl" onHide={() => setCanvasesModalShow(false)}>
        <Modal.Header closeButton>
          <Modal.Title>
            {!!canvasesModalData?.title && (
              <HTML.Tag value={canvasesModalData?.title} have_html={true} tag="div" />
            )}
          </Modal.Title>
        </Modal.Header>
        <Modal.Body>
          {!!canvasesModalData?.content && (
            <HTML.Tag value={canvasesModalData?.content} have_html={true} tag="div" />
          )}
          {!!canvasesModalData?.list && (
            <>
              {renderCanvasListData(canvasesModalData?.list)}
            </>
          )}
        </Modal.Body>
        <Modal.Footer>
          <Button variant="secondary" onClick={() => setCanvasesModalShow(false)}>
            {loc('NF.Form.Close', 'Close')}
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
};

export default ChatPageStandalone;
