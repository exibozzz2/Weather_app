<?php

namespace App\Helpers;



class CitiesHelper {

    public static function getRandomCity() {

        $cities = [
            "Ada", "Aleksandrovac", "Aleksinac", "Apatin", "Aranđelovac", "Babušnica", "Bačka Palanka",
            "Bačka Topola", "Bački Petrovac", "Bajina Bašta", "Barajevo", "Batočina", "Bečej", "Bela Crkva",
            "Bela Palanka", "Beočin", "Beograd", "Blace", "Bogatić", "Bojnik", "Boljevac", "Bor", "Bosilegrad",
            "Brus", "Bujanovac", "Čačak", "Čajetina", "Ćićevac", "Ćuprija", "Despotovac", "Dimitrovgrad",
            "Doljevac", "Gadžin Han", "Golubac", "Gornji Milanovac", "Guča", "Ivanjica", "Inđija", "Irig",
            "Jagodina", "Kanjiža", "Kačarevo", "Kikinda", "Kladovo", "Knić", "Knjaževac", "Koceljeva",
            "Kosjerić", "Kovin", "Kragujevac", "Kraljevo", "Krupanj", "Kruševac", "Kučevo", "Kuršumlija",
            "Lajkovac", "Lapovo", "Lebane", "Leskovac", "Loznica", "Lučani", "Ljig", "Majdanpek", "Mali Zvornik",
            "Mali Iđoš", "Malo Crniće", "Medveđa", "Merošina", "Mionica", "Negotin", "Niš", "Nova Varoš",
            "Novi Bečej", "Novi Kneževac", "Novi Pazar", "Novi Sad", "Obrenovac", "Opovo", "Osečina",
            "Pančevo", "Paraćin", "Petrovac na Mlavi", "Pećinci", "Pirot", "Plandište", "Požarevac",
            "Požega", "Preševo", "Priboj", "Prijepolje", "Prokuplje", "Rača", "Raška", "Ražanj", "Rekovac",
            "Ruma", "Senta", "Sečanj", "Sjenica", "Smederevo", "Smederevska Palanka", "Sokobanja", "Sombor",
            "Srbobran", "Sremska Kamenica", "Sremska Mitrovica", "Sremski Karlovci", "Stara Pazova",
            "Subotica", "Surdulica", "Svilajnac", "Svrljig", "Temerin", "Titel", "Topola", "Trgovište",
            "Trstenik", "Tutin", "Ub", "Užice", "Valjevo", "Varvarin", "Velika Plana", "Veliko Gradište",
            "Vladičin Han", "Vladimirci", "Vlasotince", "Vrnjačka Banja", "Vršac", "Žabalj", "Žabari",
            "Žagubica", "Zaječar", "Zlatibor", "Zrenjanin"
        ];


        return $cities[array_rand($cities)];
    }



}
