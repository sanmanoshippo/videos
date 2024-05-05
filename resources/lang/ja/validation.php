<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attributeは承認されている必要があります。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeは:dateより後の日付でなければなりません。',
    'after_or_equal' => ':attributeは:date以降の日付でなければなりません。',
    'alpha' => ':attributeはアルファベットのみを含む必要があります。',
    'alpha_dash' => ':attributeはアルファベット、数字、ダッシュ、アンダースコアのみを含む必要があります。',
    'alpha_num' => ':attributeはアルファベットと数字のみを含む必要があります。',
    'array' => ':attributeは配列でなければなりません。',
    'before' => ':attributeは:dateより前の日付でなければなりません。',
    'before_or_equal' => ':attributeは:date以前の日付でなければなりません。',
    'between' => [
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'file' => ':attributeは:minから:maxキロバイトの間でなければなりません。',
        'string' => ':attributeは:minから:max文字の間でなければなりません。',
        'array' => ':attributeは:minから:maxのアイテムの間でなければなりません。',
    ],
    'boolean' => ':attributeフィールドはtrueかfalseでなければなりません。',
    'confirmed' => ':attributeの確認が一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと等しい日付でなければなりません。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁でなければなりません。',
    'digits_between' => ':attributeは:minから:max桁の間でなければなりません。',
    'dimensions' => ':attributeは無効な画像サイズです。',
    'distinct' => ':attributeフィールドに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは以下のいずれかで終わる必要があります。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeの入力は必須だよ。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
        'array' => ':attributeは:value以上のアイテムを持っていなければなりません。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeは:value以上のアイテムを持つ必要があります。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeフィールドは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:value未満でなければなりません。',
        'file' => ':attributeは:valueキロバイト未満でなければなりません。',
        'string' => ':attributeは:value文字未満でなければなりません。',
        'array' => ':attributeは:value未満のアイテムを持っていなければなりません。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeは:value以下のアイテムを持つ必要があります。',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下でなければなりません。',
        'file' => ':attributeは:maxキロバイト以下でなければなりません。',
        'string' => ':attributeは:max文字以下でなければなりません。',
        'array' => ':attributeは:max個以下のアイテムを持つ必要があります。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min' => [
        'numeric' => ':attributeは:min以上でなければなりません。',
        'file' => ':attributeは:minキロバイト以上でなければなりません。',
        'string' => ':attributeは:min文字以上でなければなりません。',
        'array' => ':attributeは:min個以上のアイテムを持つ必要があります。',
    ],
    'multiple_of' => ':attributeは:valueの倍数でなければなりません。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数値でなければなりません。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeフィールドは存在している必要があります。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeの入力は必須だよ。',
    'required_if' => ':otherが:valueの場合、:attributeの入力は必須だよ。',
    'required_unless' => ':otherが:valuesでない限り、:attributeの入力は必須だよ。',
    'required_with' => ':valuesが存在する場合、:attributeの入力は必須だよ。',
    'required_with_all' => ':valuesが存在する場合、:attributeの入力は必須だよ。',
    'required_without' => ':valuesが存在しない場合、:attributeの入力は必須だよ。',
    'required_without_all' => ':valuesのいずれも存在しない場合、:attributeの入力は必須だよ。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:sizeキロバイトでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeは:size個のアイテムを含む必要があります。',
    ],
    'starts_with' => ':attributeは以下のいずれかで始まる必要があります。',
    'string' => ':attributeは文字列でなければなりません。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeはすでに存在します。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは無効なURLです。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',

    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
       'title' => '名前',
       'movie_url' => 'URL',
       'description' => '内容',
       
    ],

];
