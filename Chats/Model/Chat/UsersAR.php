<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Chat;

use Object\ActiveRecord;

class UsersAR extends ActiveRecord
{
    /**
     * @var string
     */
    public string $object_table_class = Users::class;

    /**
     * @var array
     */
    public array $object_table_pk = ['c5_chatuser_tenant_id','c5_chatuser_c5_chat_id','c5_chatuser_um_user_id'];

    /**
     * Tenant #
     *
     *
     *
     * {domain{tenant_id}}
     *
     * @var int|null Domain: tenant_id Type: integer
     */
    public int|null $c5_chatuser_tenant_id = null {
        get => $this->c5_chatuser_tenant_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_tenant_id', $value);
            $this->c5_chatuser_tenant_id = $value;
        }
    }

    /**
     * Chat #
     *
     *
     *
     * {domain{chat_id}}
     *
     * @var int|null Domain: chat_id Type: bigint
     */
    public int|null $c5_chatuser_c5_chat_id = null {
        get => $this->c5_chatuser_c5_chat_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_c5_chat_id', $value);
            $this->c5_chatuser_c5_chat_id = $value;
        }
    }

    /**
     * User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatuser_um_user_id = null {
        get => $this->c5_chatuser_um_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_um_user_id', $value);
            $this->c5_chatuser_um_user_id = $value;
        }
    }

    /**
     * Name
     *
     *
     *
     * {domain{name}}
     *
     * @var string|null Domain: name Type: varchar
     */
    public string|null $c5_chatuser_um_user_name = null {
        get => $this->c5_chatuser_um_user_name;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_um_user_name', $value);
            $this->c5_chatuser_um_user_name = $value;
        }
    }

    /**
     * Icon
     *
     *
     *
     * {domain{icon}}
     *
     * @var string|null Domain: icon Type: varchar
     */
    public string|null $c5_chatuser_icon = null {
        get => $this->c5_chatuser_icon;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_icon', $value);
            $this->c5_chatuser_icon = $value;
        }
    }

    /**
     * Avatar
     *
     *
     *
     * {domain{html_avatar_colors}}
     *
     * @var string|null Domain: html_avatar_colors Type: varchar
     */
    public string|null $c5_chatuser_avatar_colors = null {
        get => $this->c5_chatuser_avatar_colors;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_avatar_colors', $value);
            $this->c5_chatuser_avatar_colors = $value;
        }
    }

    /**
     * Photo File #
     *
     *
     *
     * {domain{file_id}}
     *
     * @var int|null Domain: file_id Type: bigint
     */
    public int|null $c5_chatuser_photo_file_id = null {
        get => $this->c5_chatuser_photo_file_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_photo_file_id', $value);
            $this->c5_chatuser_photo_file_id = $value;
        }
    }

    /**
     * Photo File URL
     *
     *
     *
     * {domain{url}}
     *
     * @var string|null Domain: url Type: text
     */
    public string|null $c5_chatuser_photo_file_url = null {
        get => $this->c5_chatuser_photo_file_url;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_photo_file_url', $value);
            $this->c5_chatuser_photo_file_url = $value;
        }
    }

    /**
     * # of Messages
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatuser_message_count = 0 {
        get => $this->c5_chatuser_message_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_message_count', $value);
            $this->c5_chatuser_message_count = $value;
        }
    }

    /**
     * Role Code
     *
     *
     *
     * {domain{lgroup_code}}
     *
     * @var string|null Domain: lgroup_code Type: varchar
     */
    public string|null $c5_chatuser_no_data_model_role_code = null {
        get => $this->c5_chatuser_no_data_model_role_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_no_data_model_role_code', $value);
            $this->c5_chatuser_no_data_model_role_code = $value;
        }
    }

    /**
     * Is A/I
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatuser_is_ai_assistant = 0 {
        get => $this->c5_chatuser_is_ai_assistant;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_is_ai_assistant', $value);
            $this->c5_chatuser_is_ai_assistant = $value;
        }
    }

    /**
     * A/I Model Code
     *
     *
     *
     * {domain{code}}
     *
     * @var string|null Domain: code Type: varchar
     */
    public string|null $c5_chatuser_ai_model_code = null {
        get => $this->c5_chatuser_ai_model_code;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_ai_model_code', $value);
            $this->c5_chatuser_ai_model_code = $value;
        }
    }

    /**
     * # of Unread Messages
     *
     *
     *
     * {domain{counter}}
     *
     * @var int|null Domain: counter Type: integer
     */
    public int|null $c5_chatuser_unread_count = 0 {
        get => $this->c5_chatuser_unread_count;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_unread_count', $value);
            $this->c5_chatuser_unread_count = $value;
        }
    }

    /**
     * Unread Message #
     *
     *
     *
     * {domain{message_id}}
     *
     * @var int|null Domain: message_id Type: bigint
     */
    public int|null $c5_chatuser_unread_c5_chatmessage_id = 0 {
        get => $this->c5_chatuser_unread_c5_chatmessage_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_unread_c5_chatmessage_id', $value);
            $this->c5_chatuser_unread_c5_chatmessage_id = $value;
        }
    }

    /**
     * Inactive
     *
     *
     *
     *
     *
     * @var int|null Type: boolean
     */
    public int|null $c5_chatuser_inactive = 0 {
        get => $this->c5_chatuser_inactive;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_inactive', $value);
            $this->c5_chatuser_inactive = $value;
        }
    }

    /**
     * Inserted Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $c5_chatuser_inserted_timestamp = null {
        get => $this->c5_chatuser_inserted_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_inserted_timestamp', $value);
            $this->c5_chatuser_inserted_timestamp = $value;
        }
    }

    /**
     * Inserted User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatuser_inserted_user_id = null {
        get => $this->c5_chatuser_inserted_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_inserted_user_id', $value);
            $this->c5_chatuser_inserted_user_id = $value;
        }
    }

    /**
     * Updated Datetime
     *
     *
     *
     *
     *
     * @var string|null Type: timestamp
     */
    public string|null $c5_chatuser_updated_timestamp = null {
        get => $this->c5_chatuser_updated_timestamp;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_updated_timestamp', $value);
            $this->c5_chatuser_updated_timestamp = $value;
        }
    }

    /**
     * Updated User #
     *
     *
     *
     * {domain{user_id}}
     *
     * @var int|null Domain: user_id Type: bigint
     */
    public int|null $c5_chatuser_updated_user_id = null {
        get => $this->c5_chatuser_updated_user_id;
        set {
            $this->setFullPkAndFilledColumn('c5_chatuser_updated_user_id', $value);
            $this->c5_chatuser_updated_user_id = $value;
        }
    }
}
