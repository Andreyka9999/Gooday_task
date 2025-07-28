1. Prasības

    PHP 8.1+

    Composer

    Node.js 18+

    NPM (vai Yarn)

    MySQL (XAMPP vai jebkurš cits serveris)

    Git (vēlams)

    XAMPP: tiek izmantots MySQL servera un lokālā tīmekļa servera (Apache) palaišanai

2. env konfigurēšana 

    cp .env.example .env

    Atveriet .env failu un norādiet datubāzes parametrus atbilstoši jūsu XAMPP (MySQL) iestatījumiem: 

3.  Atkarību instalēšana

    composer install
    npm install

4. Migrācijas un sīderu palaišana (tabulu un sākotnējo lomu/tiesību izveide)

    php artisan migrate --seed

5.  Frontend palaišana

    npm run dev

6. Backend palaišana (Laravel serveris)

    php artisan serve (parasti projekts būs pieejams http://127.0.0.1:8000).

7.  Projekta atvēršana

    Landing Page (publiskā):
    http://localhost:8000/
    Šeit pieejamas publiskās sadaļas /blogs un /news, kā arī iespēja atvērt pilnu ziņu vai bloga ierakstu. 
    Reģistrācija/Pieteikšanās:
    Pieteikšanās iespējama, izmantojot saites "Login"/"Register" (ja nav atspējotas). 
    Piekļuve administrēšanas panelim:
    Pēc pieteikšanās ar lietotāju, kuram ir loma "Admin", būs pieejama sadaļa /admin. 
    Sadaļu piemēri:
    /admin/blog — bloga ierakstu pārvaldība (CRUD)
    /admin/news — ziņu pārvaldība (CRUD
    /admin/permissions — lietotāju lomu tiesību pārvaldīb
    /admin/roles — tiesību piešķiršana lomām
    Uzmanību: Lai strādātu ar šīm sadaļām, lietotājam ir jābūt atbilstošām tiesībām

8.  Testa dati:

    Pēc datubāzes seeding tiek izveidots testa administrators (skatīt seeder).
    Ja nepieciešams, var atvērt phpMyAdmin, atrast lietotāju un iestatīt savu paroli, izmantojot bcrypt, vai arī manuāli reģistrēt jaunu lietotāju caur Web APP intefreisu.

 9. Darbības ar tiesībām

    Tikai lietotājs ar Admin lomu (un blog.manage, news.manage tiesībām) redz pogas “Edit”, “Delete”, “Create” administratora panelī.
    Lomas un tiesības var mainīt sadaļā /admin/roles un /admin/permissions.

10.  Izmantotās tehnoloģijas

      Laravel 10/11/12

    Inertia.js

    Vue 3

    Tailwind CSS

    Spatie Laravel-Permission (lomām un tiesībām)

11. XAMPP

    Palaidiet Apache un MySQL, izmantojot XAMPP vadības paneli (Control Panel)
      Izmantojiet phpMyAdmin, lai izveidotu datubāzi un skatītu tabulas 

Piezīmes

    Visas publiskās lapas ir pieejamas bez autorizācijas.

    Administrēšanas panelis un visas darbības ar saturu — tikai ar atbilstošām tiesībām.

    Pēc migrāciju izmaiņām neaizmirstiet izpildīt php artisan migrate:fresh --seed, lai datubāze būtu aktuāla.

Iespējamās problēmas

    Ja frontend nestrādā — pārbaudiet, vai ir palaists npm run dev.

    Ja kļūda 403 — lietotājam nav nepieciešamo tiesību vai lomu.

    Ja lapa neatveras — pārbaudiet, vai XAMPP ir palaidis Apache un MySQL.
