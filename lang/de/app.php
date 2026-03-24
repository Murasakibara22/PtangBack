<?php
return [
    // Navigation / Header
    'dashboard'        => 'Dashboard',
    'my_account'       => 'Mein Konto',
    'logout'           => 'Abmelden',
    'profile'          => 'Profil',

    // Login
    'good_morning'     => 'Guten Morgen',
    'good_afternoon'   => 'Guten Tag',
    'good_evening'     => 'Guten Abend',
    'enter_credentials'=> 'Bitte geben Sie Ihre Zugangsdaten ein.',
    'branch'           => 'Filiale',
    'account'          => 'Konto',
    'sub_account'      => 'Unterkonto',
    'password'         => 'PIN / Passwort',
    'login_with_id'    => 'Mit Deutsche Bank ID einloggen',
    'forgot_access'    => 'Zugangsdaten vergessen?',
    'next'             => 'Weiter',
    'login'            => 'Anmelden',

    // Messages
    'login_success'    => 'Connexion réussie !',
    'login_error'      => 'Kontonummer oder Passwort ist falsch.',
    'fill_required'    => 'Bitte füllen Sie alle Pflichtfelder aus.',
    'password_min'     => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
    'too_many_attempts'=> 'Zu viele Anmeldeversuche. Bitte warten Sie :seconds Sekunden.',

    'my_wallet'             => 'Mein Portfolio',
    'main_account'          => 'Hauptkonto',
    'suspended'             => 'Gesperrt',
    'active'                => 'Aktiv',
    'validation'            => 'GÜLTIGKEIT',
    'progress_complete'     => '37% Abgeschlossen',

    // Catégories dépenses
    'bills'                 => 'Rechnungen',
    'investment'            => 'Investitionen',
    'restaurant'            => 'Restaurant',

    // Historique paiements
    'payment_history'       => 'Zahlungsverlauf',
    'payments'              => 'Zahlungen',
    'tab_month'             => 'Monat',
    'tab_week'              => 'Woche',
    'tab_today'             => 'Heute',

    // Statuts transaction
    'status_completed'      => 'Abgeschlossen',
    'status_canceled'       => 'Storniert',
    'status_pending'        => 'Ausstehend',

    // Détails accordion
    'payment_id'            => 'Zahlungs-ID',
    'payment_method'        => 'Zahlungsmethode',
    'invoice_date'          => 'Rechnungsdatum',
    'due_date'              => 'Fälligkeitsdatum',
    'date_paid'             => 'Bezahlt am',
    'no_transactions'       => 'Keine Transaktionen vorhanden.',

    // Actions rapides
    'transfer'              => 'Überweisung',
    'pay_bills'             => 'Rechnungen bezahlen',

    // Types de commerce
    'online_shop'           => 'Online-Shop',

     /*
    |--------------------------------------------------------------------------
    | Home / Dashboard
    |--------------------------------------------------------------------------
    */
    'welcome'               => 'Willkommen',
    'blocked'               => 'Gesperrt',
    'credit_limit'          => 'Kreditlimit',

    // Statistiques
    'income'                => 'Einnahmen',
    'expenses'              => 'Ausgaben',
    'days_30'               => '(30 Tage)',
    'last_week'             => 'Letzte Woche',
    'weekly_wallet_usage'   => 'Wöchentliche Portfolio-Nutzung',


    /*
    |--------------------------------------------------------------------------
    | Transactions
    |--------------------------------------------------------------------------
    */

    // Widgets stats
    'tx_total'              => 'Gesamt',
    'tx_pending'            => 'In Bearbeitung',
    'tx_failed'             => 'Fehlgeschlagen',
    'tx_success'            => 'Erfolgreich',

    // Tableau
    'tx_history'            => 'Transaktionsverlauf',
    'tx_new'                => 'Transaktion durchführen',
    'filter_date'           => 'Datum filtern',
    'filter_today'          => 'Heute',
    'filter_last_week'      => 'Letzte Woche',
    'filter_last_month'     => 'Letzten Monat',

    // Colonnes tableau
    'col_id'                => 'ID',
    'col_date'              => 'Datum',
    'col_beneficiary'       => 'Empfänger',
    'col_amount'            => 'Betrag',
    'col_bank'              => 'Kreditinstitut',
    'col_bic'               => 'BIC-Code',
    'col_status'            => 'Status',
    'col_actions'           => 'Aktionen',
    'col_detail'            => 'Details',

    // Modal formulaire
    'modal_title'           => 'Empfängerdaten eingeben',
    'field_iban_nat'        => 'IBAN-Nationalität',
    'field_iban_nat_ph'     => 'z.B. Deutschland',
    'field_amount'          => 'Betrag (EUR)',
    'field_amount_ph'       => '000000 EUR',
    'field_bank'            => 'Kreditinstitut',
    'field_bank_ph'         => 'Name der Bank',
    'field_beneficiary'     => 'Name und Vorname des Empfängers',
    'field_beneficiary_ph'  => 'Vor- und Nachname',
    'field_email'           => 'E-Mail des Empfängers',
    'field_email_ph'        => 'beispiel@xxx.com',
    'field_iban'            => 'IBAN',
    'field_iban_ph'         => 'IBAN-Code eingeben',
    'field_bic'             => 'BIC-Code',
    'field_description'     => 'Beschreibung',
    'field_description_ph'  => 'Verwendungszweck für diese Transaktion eingeben...',
    'btn_validate'          => 'Bestätigen',

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    'edit_profile'          => 'Profil bearbeiten',
    'profile'               => 'Profil',
    'app'                   => 'App',
    'personal_info'         => 'Persönliche Informationen',

    // Champs profil affichage
    'field_name'            => 'Name',
    'field_iban'            => 'IBAN',
    'field_country'         => 'Land',
    'field_address'         => 'Adresse',
    'field_city'            => 'Stadt',
    'field_birthdate'       => 'Geburtsdatum',
    'field_contact'         => 'Kontakt',
    'field_bank_name'       => 'Bank',

    // Modal modifier profil
    'modal_edit_profile'    => 'Meine Daten bearbeiten',
    'field_lastname'        => 'Nachname',
    'field_firstname'       => 'Vorname',
    'field_email'           => 'E-Mail',
    'field_phone'           => 'Kontakt',
    'field_account_number'  => 'Kontonummer',
    'field_cvc'             => 'CVC/CVV',
    'field_expiry'          => 'Ablaufdatum',
    'btn_save'              => 'Speichern',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Header
    |--------------------------------------------------------------------------
    */
    "nav_my_account"        => "Mein Konto",
    "nav_wallet"            => "Portfolio",
    "nav_transactions"      => "Transaktionen",
    "nav_profile"           => "Profil",

    // Header
    "header_search_ph"      => "Suchen...",
    "header_welcome"        => "Willkommen,",
    "header_profile"        => "Profil",
    "header_logout"         => "Abmelden",
];
