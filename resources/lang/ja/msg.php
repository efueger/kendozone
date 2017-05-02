<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Defines all messages sent from flash
    |--------------------------------------------------------------------------
    |
    |
    */
    'user_already_exists' => 'ユーザーはもう存在します。',
    'user_already_registered_in_category' => 'ユーザーはもうこのカテゴリに登録されています。',

//　Torneo
    'tournament_create_successful' => '大会<b>：name</b><br/> が作成されました',
    'tournament_update_successful' => '大会<b>：name</b><br/> が更新されました',
    'tournament_delete_successful' => '大会<b>：name</b><br/> が削除されました',
    'tournament_restored_successful' => '大会<b>：name</b><br/> が復元されました',

    'tournament_create_error' => 'おっと！大会の作成中にエラーが発生しました ',
    'tournament_update_error' => 'おっと！大会の更新中にエラーが発生しました ',
    'tournament_delete_error' => '大会の削除中にエラーが発生しました：name',
    'tournament_restored_error' => '大会の復元中にエラーが発生しました：name',


//Usuario
    'user_create_successful' => 'ユーザーが<br/> 作成しました',
    'user_update_successful' => 'ユーザーが<br/> 更新されました',
    'user_delete_successful' => 'ユーザーが<br/> 削除されました',
    'user_restore_successful' => 'ユーザーが<br/> 復元しました',
    'user_registered_successful' => '大会に追加されたユーザー<br/> ：tournament',

    'user_create_error' => 'おっと！ユーザーの作成中にエラーが発生しました。',
    'user_update_error' => 'おっと！ユーザーの更新中にエラーが発生しました。',
    'user_delete_error' => 'ユーザーの削除中にエラーが発生しました',
    'user_restore_error' => 'ユーザーの復元中にエラーが発生しました',
    'user_registered_error' => 'ユーザーの登録中にエラーが発生しました',

    'user_status_successful' => 'ステータスが更新されました',
    'user_status_error' => 'エラー更新中：name',


// Categoria
    'category_create_successful' => 'カテゴリ設定',
    'category_update_successful' => 'カテゴリが更新されました',
    'category_delete_successful' => 'カテゴリが削除されました',

    'category_create_error' => 'おっと！カテゴリ作成エラー ',
    'category_update_error' => 'おっと！カテゴリ更新エラー ',
    'category_delete_error' => 'カテゴリの削除中にエラーが発生しました：name',
    'you_must_choose_at_least_one_championship' => '少なくとも1つの選手権を選ぶ必要があります。 ',


//Invitation

    'invitation_needed' => 'この大会に登録するには招待状が必要です。',
    'invitation_expired' => '登録日が間違っているか,招待状が期限切れです。',
    'invitation_used' => '招待状は既に使用されています',
    'invitation_sent' => '招待状が送られました',
    'Email_not_valid' => '電子メール：電子メールが無効です。キャンセルされた操作 ',
    'tx_for_register_tournament' => '登録トーナメントありがとう：大会',
// Permisos
    'access_denied' => 'アクセス拒否',


//Federation
    'Federation_edit_successful' => '連盟 < b>：name </ b ><br />更新されました',

    'you_dont_own_federation' => 'あなたはどんな連合も所有していません。',
    'please_ask_superadmin' => '正式なFIKデータを更新して管理者に依頼する（contact@kendozone . com）',

//Association
    'association_create_successful' => '連盟 < br /><b >:name </b ><br />作成されました’',
    'association_edit_successful' => '関連<br/><b>:name</b><br/> 更新されました',
    'association_delete_successful' => '関連<br/><b>:name</b><br/> 削除されました',
    'association_delete_error' => '関連付けの削除中にエラーが発生しました',
    'association_restored_successful' => '関連<br/><b>:name</b><br/> 復元されました',
    'association_restored_error' => '関連付けを復元中のエラー',

    'you_dont_own_association' => 'あなたはどんな関係も持っていません',
    'please_ask_federationPresident' => 'あなたの連盟長にリクエストしてください。',
// Club
    'club_create_successful' => 'クラブ<br/><b>:name</b><br/> 作成されました',
    'club_edit_successful' => 'クラブ<br/><b>:name</b><br/> 更新されました',
    'club_delete_successful' => 'クラブ<br/><b>:name</b><br/> 削除されました',
    'club_delete_error' => 'クラブの削除中にエラーが発生しました',
    'club_restored_successful' => 'クラブ<br/><b>:name</b><br/> が復元されました',
    'club_restored_error' => 'クラブの復元中にエラーが発生しました',

    'you_dont_own_club' => 'あなたはクラブを所有していません',
    'please_ask_associationPresident' => 'あなたの協会会長にリクエストする',

//Team

    'team_create_successful' => 'チーム<<br/><b>:name</b><br/> 作成されました',
    'team_edit_successful' => 'チーム<br/><b>:name</b><br/> を更新しました',
    'team_delete_successful' => 'チーム<br/><b>:name</b><br/> 削除されました',
    'team_delete_error' => 'チームの削除中にエラーが発生しました',
    'team_restored_successful' => 'チーム<br/><b>:name</b><br/> 復元されました',
    'team_restored_error' => 'チームの復元中にエラーが発生しました',
    'club_president_already_exists' => '「ユーザー：もう他のクラブの社長です」',
    'association_president_already_exists' => '「ユーザー：ユーザーはすでに他の組長です」',
    'federation_president_already_exists' => '「ユーザー：ユーザーは既に他の連盟長です」',

    'please_create_account_before_playing' => '大会：大会を登録するには,Kendozoneアカウントを作成する必要があります。ガンバテ!!! ',
    'user_has_registered_to_tournament' => '：user_nameが大会に登録されました：ｔournament',
    'user_has_registered_to_championships' => '：user_nameが選手権に登録しました：',
    'success _ to _ all' => '¡みんなに頑張って！ ',


    'are_you_sure' => 'ツリーを置き換えますか？',
    'this_will_delete_previous_tree' => 'このアクションは既存のツリーを消去します',
    'cancel_it' => 'キャンセル',
    'do_it_again' => 'OK',
    'cancelled' => 'キャンセル',
    'operation_cancelled' => '操作がキャンセルされました',
    'championships_tree_generation_success' => 'ツリーを作りました！',
    'min_competitor_required' => '「立ち合いの数を減らしたり,立ち合い数を減らしたり,より多くの競合相手を招待したりします。',


    'tournament_date_is_in_the_past_title' => 'the Deadline Registration Date is past due',
    'tournament_date_is_in_the_past_text' => 'please change the Deadline Registration Date to a future day',


    // Federation
    'federation_edit_successful' => 'Federation <br/><b>:name</b><br/> updated',


    'team_create_error_already_exists' => 'team <br/><b>:name</b><br/> already exists',
    'success_to_all' => '¡Success to all!',

    // Tree
    'tree_edit_successful' => 'tree updated',

];
