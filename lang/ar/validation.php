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

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما :other يكون :value.',
    'active_url' => 'يجب أن يكون حقل :attribute عنوان URL صالحاً.',
    'after' => 'يجب أن يكون حقل :attribute تاريخًا بعد :date.',
    'after_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي حقل :attribute فقط على أحرف.',
    'alpha_dash' => 'يجب أن يحتوي حقل :attribute فقط على حروف، أرقام، شرطات وشرطات سفلية.',
    'alpha_num' => 'يجب أن يحتوي حقل :attribute فقط على أحرف وأرقام.',
    'array' => 'يجب أن يكون حقل :attribute مصفوفة.',
    'ascii' => 'يجب أن يحتوي حقل :attribute فقط على أحرف وأرقام أحادية البايت ورموز.',
    'before' => 'يجب أن يكون حقل :attribute تاريخًا قبل :date.',
    'before_or_equal' => 'يجب أن يكون حقل :attribute تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يحتوي حقل :attribute على بين :min و :max عنصرًا.',
        'file' => 'يجب أن يكون حقل :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute بين :min و :max.',
        'string' => 'يجب أن يكون حقل :attribute بين :min و :max حرفًا.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
    'can' => 'يحتوي حقل :attribute على قيمة غير مسموح بها.',
    'confirmed' => 'تأكيد حقل :attribute غير مطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'يجب أن يكون حقل :attribute تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute تاريخًا يساوي :date.',
    'date_format' => 'يجب أن يكون حقل :attribute بتنسيق :format.',
    'decimal' => 'يجب أن يكون حقل :attribute بـ :decimal أماكن عشرية.',
    'declined' => 'يجب رفض حقل :attribute.',
    'declined_if' => 'يجب رفض حقل :attribute عندما :other يكون :value.',
    'different' => 'يجب أن يكون حقل :attribute مختلفًا عن :other.',
    'digits' => 'يجب أن يكون حقل :attribute :digits أرقام.',
    'digits_between' => 'يجب أن يكون حقل :attribute بين :min و :max أرقام.',
    'dimensions' => 'يحتوي حقل :attribute على أبعاد صورة غير صالحة.',
    'distinct' => 'يحتوي حقل :attribute على قيمة مكررة.',
    'doesnt_end_with' => 'يجب ألا ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'يجب ألا يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة :attribute غير صالحة.',
    'exists' => 'القيمة المحددة :attribute غير صالحة.',
    'extensions' => 'يجب أن يحتوي حقل :attribute على إحدى الامتدادات التالية: :values.',
    'file' => 'يجب أن يكون حقل :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عنصرًا.',
        'file' => 'يجب أن يكون حقل :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أكبر من :value.',
        'string' => 'يجب أن يكون حقل :attribute أكبر من :value حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :value عنصرًا أو أكثر.',
        'file' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value.',
        'string' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value حرفًا.',
    ],
    'hex_color' => 'يجب أن يكون حقل :attribute لونًا سداسي عشريًا صالحًا.',
    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'القيمة المحددة :attribute غير صالحة.',
    'in_array' => 'يجب أن يحتوي حقل :attribute على قيمة موجودة في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون حقل :attribute سلسلة JSON صالحة.',
    'lowercase' => 'يجب أن يكون حقل :attribute في حالة صغيرة.',
    'lt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصر.',
        'file' => 'يجب أن يكون حقل :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من :value.',
        'string' => 'يجب أن يكون حقل :attribute أقل من :value حرف.',
    ],
    'lte' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :value عنصر.',
        'file' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value.',
        'string' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value حرف.',
    ],
    'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC صالح.',
    'max' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصر.',
        'file' => 'يجب أن لا يكون حقل :attribute أكبر من :max كيلوبايت.',
        'numeric' => 'يجب ألا يكون حقل :attribute أكبر من :max.',
        'string' => 'يجب ألا يكون حقل :attribute أكبر من :max حرف.',
    ],
    'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max رقمًا.',
    'mimes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
    'mimetypes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عنصر.',
        'file' => 'يجب أن يكون حقل :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute على الأقل :min.',
        'string' => 'يجب أن يكون حقل :attribute على الأقل :min حرف.',
    ],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على الأقل على :min رقمًا.',
    'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
    'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :other هو :value.',
    'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا ما لم يكن :other هو :value.',
    'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => 'يجب أن يكون حقل :attribute مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة :attribute غير صالحة.',
    'not_regex' => 'تنسيق حقل :attribute غير صالح.',
    'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف كبير وحرف صغير واحد على الأقل.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'الـ :attribute المعطى قد ظهر في تسريب بيانات. يرجى اختيار :attribute مختلفًا.',
    ],
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'present_if' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :other هو :value.',
    'present_unless' => 'يجب أن يكون حقل :attribute موجودًا ما لم يكن :other هو :value.',
    'present_with' => 'يجب أن يكون حقل :attribute موجودًا عندما يكون :values موجودًا.',
    'present_with_all' => 'يجب أن يكون حقل :attribute موجودًا عندما تكون :values موجودة.',
    'prohibited' => 'يحظر حقل :attribute.',
    'prohibited_if' => 'يحظر حقل :attribute عندما يكون :other هو :value.',
    'prohibited_unless' => 'يحظر حقل :attribute ما لم يكن :other في :values.',
    'prohibits' => 'يمنع حقل :attribute :other من الوجود.',
    'regex' => 'تنسيق حقل :attribute غير صالح.',
    'required' => 'يجب توفير حقل :attribute.',
    'required_array_keys' => 'يجب أن تحتوي مفاتيح مصفوفة :attribute على: :values.',
    'required_if' => 'يجب توفير حقل :attribute عندما يكون :other هو :value.',
    'required_if_accepted' => 'يجب توفير حقل :attribute عندما يتم قبول :other.',
    'required_unless' => 'يجب توفير حقل :attribute ما لم يكن :other في :values.',
    'required_with' => 'يجب توفير حقل :attribute عندما تكون :values موجودة.',
    'required_with_all' => 'يجب توفير حقل :attribute عندما تكون :values موجودة.',
    'required_without' => 'يجب توفير حقل :attribute عندما لا تكون :values موجودة.',
    'required_without_all' => 'يجب توفير حقل :attribute عندما لا تكون أي من :values موجودة.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :size عنصر.',
        'file' => 'يجب أن يكون حقل :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute :size.',
        'string' => 'يجب أن يكون حقل :attribute :size حرف.',
    ],
    'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون حقل :attribute سلسلة نصية.',
    'timezone' => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
    'unique' => 'تم اختيار :attribute مسبقاً.',
    'uploaded' => 'فشل تحميل :attribute.',
    'uppercase' => 'يجب أن يكون حقل :attribute في حالة كبيرة.',
    'url' => 'يجب أن يكون حقل :attribute رابطًا صالحًا.',
    'ulid' => 'يجب أن يكون حقل :attribute ULID صالحًا.',
    'uuid' => 'يجب أن يكون حقل :attribute UUID صالحًا.',

    'products' => [
        'name' => [
            '*' => [
                'ar' => [
                    'required' => 'حقل الاسم باللغة العربية مطلوب.',
                    'string' => 'حقل الاسم باللغة العربية يجب أن يكون نصًا.',
                    'min' => 'حقل الاسم باللغة العربية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الاسم باللغة العربية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
                'en' => [
                    'required' => 'حقل الاسم باللغة الإنجليزية مطلوب.',
                    'string' => 'حقل الاسم باللغة الإنجليزية يجب أن يكون نصًا.',
                    'min' => 'حقل الاسم باللغة الإنجليزية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الاسم باللغة الإنجليزية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
            ]
        ],
        'slug' => [
            '*' => [
                'ar' => [
                    'required' => 'حقل الرابط باللغة العربية مطلوب.',
                    'string' => 'حقل الرابط باللغة العربية يجب أن يكون نصًا.',
                    'min' => 'حقل الرابط باللغة العربية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الرابط باللغة العربية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
                'en' => [
                    'required' => 'حقل الرابط باللغة الإنجليزية مطلوب.',
                    'string' => 'حقل الرابط باللغة الإنجليزية يجب أن يكون نصًا.',
                    'min' => 'حقل الرابط باللغة الإنجليزية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الرابط باللغة الإنجليزية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
            ]
        ],

        'sku' => [
            'required' => 'حقل SKU مطلوب.',
            'min' => 'يجب أن يحتوي حقل SKU على الأقل على :min أحرف.',
            'max' => 'يجب أن يحتوي حقل SKU على الأكثر على :max أحرف.',
            'unique' => 'حقل SKU مستخدم من قبل.',
        ],
        'barcode' => [
            'required' => 'حقل الباركود مطلوب.',
            'min' => 'يجب أن يحتوي حقل الباركود على الأقل على :min أحرف.',
            'max' => 'يجب أن يحتوي حقل الباركود على الأكثر على :max أحرف.',
            'unique' => 'حقل الباركود مستخدم من قبل.',
        ],
        'active' => [
            'required' => 'حقل التفعيل مطلوب.',
            'boolean' => 'يجب أن يكون حقل التفعيل إما صحيحًا أو خاطئًا.',
        ],
        'source' => [
            'required' => 'حقل المصدر مطلوب.',
        ],
        'images' => [
            '*' => [
                'required' => 'حقل الصور مطلوب.',
                'image' => [
                    'image' => 'حقل الصور يجب ان يكون صورة',
                    'mimes' => 'حقل الصور يجب ان يكون من الانواع التالية: :values',
                    'max' => 'حقل الصور يجب ان لا يتجاوز :max كيلوبايت',
                    'required' => 'حقل الصور مطلوب.',
                ],
                'is_main' => [
                    'required' => 'حقل رئيسي مطلوب.',
                    'boolean' => 'حقل الرئيسية يجب ان يكون صحيح او خاطئ',
                    'distinct' => 'لا يمكن لأكثر من صوره ان تكون صوره رئيسيه',
                ],
            ],
            'array' => 'حقل الصور يجب ان يكون مصفوفة',
        ],
    ],
    'ingredients' => [
        'name' => [
            '*' => [
                'ar' => [
                    'required' => 'حقل الاسم باللغة العربية مطلوب.',
                    'string' => 'حقل الاسم باللغة العربية يجب أن يكون نصًا.',
                    'min' => 'حقل الاسم باللغة العربية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الاسم باللغة العربية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
                'en' => [
                    'required' => 'حقل الاسم باللغة الإنجليزية مطلوب.',
                    'string' => 'حقل الاسم باللغة الإنجليزية يجب أن يكون نصًا.',
                    'min' => 'حقل الاسم باللغة الإنجليزية يجب أن يكون على الأقل :min حرفًا.',
                    'max' => 'حقل الاسم باللغة الإنجليزية لا يجوز أن يكون أكبر من :max حرفًا.',
                ],
            ]
        ],
        'stock' => [
            'required' => 'حقل المخزون مطلوب.',
            'int' => 'حقل المخزون يجب ان يكون رقما',
        ],
        'type' => [
            'required' => 'نوع المخزون مطلوب',
            'in' => 'نوع المخزون يجب ان يكون g او kg'
        ]
    ],
    'orders' => [
        'products' => [
            'required' => 'حقل المنتجات مطلوب.',
            'array' => 'حقل المنتجات يجب ان يكون مصفوفة.',
            '*' => [
                'id' => [
                    'required' => 'معرف المنتج مطلوب.',
                    'exists' => 'معرف المنتج المحدد غير صالح.',
                ],
                'quantity' => [
                    'required' => 'كمية المنتج مطلوبة.',
                    'int' => 'كمية المنتج يجب ان تكون عدداً صحيحاً.',
                    'min' => 'كمية المنتج يجب ان تكون على الأقل :min.',
                ],
            ],
        ],
    ],
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

    'attributes' => [],

];
