<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement("INSERT INTO languages(name, code) VALUES('Portuguese', 'pt');");
        DB::statement("INSERT INTO languages(name, code) VALUES('English', 'en');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Afar', 'aa');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Abkhazian', 'ab');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Afrikaans', 'af');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Amharic', 'am');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Arabic', 'ar');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Assamese', 'as');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Aymara', 'ay');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Azerbaijani', 'az');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bashkir', 'ba');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Belarusian', 'be');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bulgarian', 'bg');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bihari', 'bh');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bislama', 'bi');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bengali/Bangla', 'bn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tibetan', 'bo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Breton', 'br');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Catalan', 'ca');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Corsican', 'co');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Czech', 'cs');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Welsh', 'cy');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Danish', 'da');");
        DB::statement("INSERT INTO languages(name, code) VALUES('German', 'de');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Bhutani', 'dz');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Greek', 'el');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Esperanto', 'eo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Spanish', 'es');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Estonian', 'et');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Basque', 'eu');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Persian', 'fa');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Finnish', 'fi');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Fiji', 'fj');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Faeroese', 'fo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('French', 'fr');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Frisian', 'fy');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Irish', 'ga');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Scots/Gaelic', 'gd');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Galician', 'gl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Guarani', 'gn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Gujarati', 'gu');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Hausa', 'ha');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Hindi', 'hi');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Croatian', 'hr');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Hungarian', 'hu');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Armenian', 'hy');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Interlingua', 'ia');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Interlingue', 'ie');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Inupiak', 'ik');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Indonesian', 'in');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Icelandic', 'is');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Italian', 'it');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Hebrew', 'iw');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Japanese', 'ja');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Yiddish', 'ji');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Javanese', 'jw');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Georgian', 'ka');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kazakh', 'kk');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Greenlandic', 'kl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Cambodian', 'km');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kannada', 'kn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Korean', 'ko');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kashmiri', 'ks');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kurdish', 'ku');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kirghiz', 'ky');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Latin', 'la');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Lingala', 'ln');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Laothian', 'lo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Lithuanian', 'lt');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Latvian/Lettish', 'lv');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Malagasy', 'mg');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Maori', 'mi');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Macedonian', 'mk');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Malayalam', 'ml');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Mongolian', 'mn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Moldavian', 'mo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Marathi', 'mr');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Malay', 'ms');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Maltese', 'mt');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Burmese', 'my');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Nauru', 'na');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Nepali', 'ne');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Dutch', 'nl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Norwegian', 'no');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Occitan', 'oc');");
        DB::statement("INSERT INTO languages(name, code) VALUES('(Afan)/Oromoor/Oriya', 'om');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Punjabi', 'pa');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Polish', 'pl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Pashto/Pushto', 'ps');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Quechua', 'qu');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Rhaeto-Romance', 'rm');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kirundi', 'rn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Romanian', 'ro');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Russian', 'ru');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Kinyarwanda', 'rw');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Sanskrit', 'sa');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Sindhi', 'sd');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Sangro', 'sg');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Serbo-Croatian', 'sh');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Singhalese', 'si');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Slovak', 'sk');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Slovenian', 'sl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Samoan', 'sm');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Shona', 'sn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Somali', 'so');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Albanian', 'sq');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Serbian', 'sr');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Siswati', 'ss');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Sesotho', 'st');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Sundanese', 'su');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Swedish', 'sv');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Swahili', 'sw');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tamil', 'ta');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Telugu', 'te');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tajik', 'tg');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Thai', 'th');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tigrinya', 'ti');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Turkmen', 'tk');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tagalog', 'tl');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Setswana', 'tn');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tonga', 'to');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Turkish', 'tr');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tsonga', 'ts');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Tatar', 'tt');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Twi', 'tw');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Ukrainian', 'uk');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Urdu', 'ur');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Uzbek', 'uz');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Vietnamese', 'vi');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Volapuk', 'vo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Wolof', 'wo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Xhosa', 'xh');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Yoruba', 'yo');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Chinese', 'zh');");
        DB::statement("INSERT INTO languages(name, code) VALUES('Zulu', 'zu');");

    }
}
