<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Branch::factory()->count(5)->create();

        DB::table('branches')->upsert([


                //  Location Office of the Head of Civil Service of the Federation
                [
                    "name" => "Block A, Federal Secretariat Complex, Shehu Shagari Way, Central Business District, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // Locations of Agencies under Office of the Head of Civil Service of the Federation
                [
                    "name" => "P.M.B 1004, Topo, Badagry, Lagos, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "A234, Kubwa, Abuja 901101, Federal Capital Territory, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1300 Funmilayo Ransome Kuti Road, Area 3, Garki, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location of Federal Ministry of Mines and Steel Development
                [
                    "name" => "Block 5A, Federal Secretariat Complex, Shehu Shagari Way, Central Business District, Abuja,Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                 // Locations of Agencies under Federal Ministry of Mines and Steel Development
                [
                    "name" => "Plot 82, No. 11A Yakubu Gowan Cresent, Asokoro, Abuja,",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4Q2X+HGW, Owerri Road Layout, Obosi 434109, Anambra",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "18 Rabah Road, Malali, Kaduna 800283, Kaduna",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "XV27+R87, A236, Rafin Par 930105, Plateau",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "KM 15, Okene-Lokoja Road, PMB 1001, Itakpe, Kogi State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // LOCATION OF FEDERAL MINISTRY OF WATER RESOURCES & RURAL DEVELOPMENT
                [
                    "name" => "P.M.B. 159, Block A, Old Secretariat Area I, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // Locations of Agencies under WATER RESOURCES & RURAL DEVELOPMENT
                [
                    "name" => "No. 04 Inuwa, Wada Aliyu St, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Alabata Road, Abeokuta 110121, Ogun State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1 Azikiwe Road, P.M.B 5676, Port Harcourt, Rivers State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "PMB 2309 Mando Road, Kaduna, Kaduna State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Anambra Imo River Basin Authority, PMB 1301, Agbala, Owerri, Imo State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Upper Benue River Basin Development Authority, Yola Mbamba – Fufore Road, P.M.B 2086, Yola Adamawa State.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 24, Off Obayantor,, Benin Sapele Rd, Benin City",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "KM 5 Minna - Zungeru Rd, Bosso, Minna 920101, Niger",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 10 Old Otukpo Rd, Wurukum, Makurdi 970101, Benue",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 222, Foundation Plaza, Shettima Ali Monguno Crescent, Utako, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 502 Abogo Langema Street, Central Business District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Mohamet Lawan Building, Km 6, Dikwa Road, Maiduguri, Borno State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Damale Kaita House, Gusau Road, PMB 2223, Sokoto, Sokoto State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Murtala Mohammed Highway, P.M.B. 1249, Calabar, Cross River State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "P.M.B. 3168, Maiduguri Road, Hotoro, Kano",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Basin Road, PMB 1529, Ilorin, Kwara State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location of Federal Ministry of Housing & Urban Development
                [
                    "name" => "Mabushi District, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // Locations of Agencies under Housing & Urban Development
                [
                    "name" => "Second floor, Annex 3, Phase 1, Federal Secretariat, CBD, Abuja FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Federal Housing Authority, 26 Julius Nyerere Crescent, Asokoro, PMB 101, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "The Mortgage House, 266 Tafawa Balewa Rd, Central Business Dis, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "10 Yawuri street, off Jere street, Garki II, PMB 428 Garki, Abuja.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location of FEDERAL MINISTRY OF ENVIRONMENT
                [
                    "name" => "Federal Secretariat Complex 9th Floor, Shehu Shagari Way P.M.B. 468, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // Locations of Agencies under FEDERAL MINISTRY OF ENVIRONMENT
                [
                    "name" => "GROUND FLOOR, FEDERAL SEC, PHASE 1 COMPLEX, Kaura, Abuja 900001, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Idi Ishin Jericho Road, Ibadan",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3CGJ+8C9, Ebitu Ukiwe St, Jabi, Abuja 900108, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 56 Lome Crescent, Wuse Zone 7, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "NAIC Building, 5th Floor,Plot 590, Zone AO, Central Business District, Abuja 900211, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Umaru Musa Yar’adua Express Way, P M B 0258, Garki-Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 3, Kalahari close, Off ICS Drive, Dakibiyu, Jabi, FCT. Abuja, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location of Federal Ministry of Justice
                [
                    "name" => "Shehu Shagari Way, Central Business District, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // Locations of Agencies under MINISTRY OF JUSTICE
                [
                    "name" => "Bwari, P.M.B 170, Garki, Abuja, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No 6 Portharcourt Crescent Area 11 Garki Abuja Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3F7X+69M, Federal Secretariat Complex, Phase I, Shehu Shagari Wy, Central Business District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "22 Port Harcourt Cres, Garki, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Supreme Court Complex, Central Area PMB 385, Garki, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "2A Ozumba Mbadiwe Ave, Victoria Island, Lagos 106104, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 5, Plot 2028 Dalaba St, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "PMB 359, C&C Towers, Federal Secretariat Complex, Phase III, Block J, 4th & 5th Floor, Garki, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "19 Aguiyi Ironsi St, Maitama, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "PMB 359, C&C Towers, Federal Secretariat Complex, Phase III, Block J, 4th & 5th Floor, Garki, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                    // Location of FEDERAL MINISTRY OF WORKS
                [
                    "name" => "Radio House,Herbert Macaulay Way (South), Garki, Abuja(Opp. IntI. Conference Centre)",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                    //Locations of Agencies under Federal Ministry of Works
                [
                    "name" => "163, Aminu Kano Crescent,. Wuse II, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 4, 22 Addis - Ababa Cres, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // LOCATION OF FEDERAL MINISTRY OF EDUCATION
                [
                    "name" => "Federal Secretariat, Phase 2 (3rd Floor), Shehu Shagari Way, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // Locations of Agencies under MINISTRY OF EDUCATION
                [
                    "name" => "Rigachikun, Kaduna-Zaria Road, Kaduna.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "26, Aguiyi Ironsi street PMB 237 Garki GPO,Maitama, Abuja.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 135 Lokoja-Kaduna Road, Sheda FCT-Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "21, Hussey Street, Yaba PMB 1022, Yaba Lagos State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "The Nigeria French Language Village, Badagry, Lagos State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Ladoke Akintole Boulevard, Garki, Abuja 900110, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 8, Bida Road, P.M.B 159, Minna, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Public Service Institue of Nigeria kubwa road, dutse junction, Maitama, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot B Bida Road, PMB 2239. Kaduna - Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "72 Ahmadu Bello Wy, Central Business District, Abuja 900108, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 4, 7 Gwani St, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "829 Ralph Shodeinde St, Central Business District, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1321, Adesoji Aderemi Street, Gudu District, Cadestral Zone B1, Abuja.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "6 Zambezi Crescent, Off Aguiyi Ironsi Street, Maitama, Abuja, F.C.T., Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "National Secretariat, Suleja Road, Bwari PMB 169, Garki",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 1 Benin-Agbor Road, Ikpoba Hill,Benin City",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 4, Laje Road, LGA, Ondo",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Rigachikun, PMB 2191 Kaduna, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "56 New Umuahia Rd, Ogbor Hill, Aba 453106, Abia",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "274 Wole Olanipekun St, Central Business Dis, Abuja 563744, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3FF3+CGV, Nnamdi Azikiwe Expy, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Lagos St, opposite Nakowa hospital, Maiduguri 600282, Borno",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Block 11 Zone 3 P.M.B 118, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location Federal Ministry of Budget and Economic Planning
                [
                    "name" => "2FW7+PG5 National Planning Commission, Room 214, 2nd Floor, Plot 421 Constitution Ave, Central Business Dis, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                //Locations of Agencies under Federal Ministry of Budget and Economic Planning

                [
                    "name" => "Plot 421 Constitution Avenue, Abuja, Nigeria 900000",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "48 Aminu Kano Crescent, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 762 Independence Avenue, Central Business District",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "P.M.B. 5, U.I. Post Office, Ojoo, Oyo Road, Ibadan",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // Location of Federal Ministry of Health and Social Welfare
                [
                    "name" => "Block 4A (301-399), 3rd Floor New Fed. Secretariat Complex Shehu Shagari Way,P.M.B. 83, (Garki Post Office), Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // Locations of Agencies under Federal Ministry of Health and Social Welfare
                [
                    "name" => "Plot 297 Yaradua Way Abuja, Utako, District",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 2032, Olusegun, Obasanjo Way, Zone 7, Wuse, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "6, Edmund Crescent off Murtala Mohammed Way, P.M.B. 2013 Yaba, Lagos,",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 681, 682 Port Harcourt Cres, Garki, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 801, Ebitu Ukiwe Street, Jabi, Abuja, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 942, Cadastral Zone C16, Idu Industrial District 1B, P.M.B. 21, Garki, Idogwari, Faidna",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                 // FEDERAL MINISTRY OF SOLID MINERALS DEVELOPMENT
                [
                    "name" => "5th Floor, Annex 3, New Federal Secretariat Complex, Shehu Shagari Way, Central Area, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                        // TO ADD THE AGENCIES LOCATIONS OF THE MINISTRY

                    // Federal Ministry of Marine and Blue Economy
                [
                    "name" => "Federal Secretariat Complex, Shehu Shagari Way, Central Business District, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // Location of agencies under Marine and blue economy
                [
                    "name" => "4, Burma Road, off Wharf Road, Apapa, Lagos State 101251",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "26/28 Marina, Lagos. P.M.B 12588 Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Aliyu Obaje Rd. off Hydro JunctionAdankolo New Layout, PMB 1004Lokoja, Kogi State.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4, Otunba Ayodele Soyode Lane (formerly Park Lane), Apapa, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 4, College Road,P.M.B 1089, Oron, Akwa Ibom, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "51 Khartoum St, Wuse, Abuja, Nigeria, Abuja, Abuja 904101",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                // Federal Ministry of Humanitarian Affairs and Poverty Alleviation
                [
                    "name" => "14, Port Harcourt Crescent, Off Gimbiya Street, Area 11, Garki, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // Locations of Agencies under hummanitarian Affairs

                [
                    "name" => "1st Floor, Annex 1, Shehu Shagari Way,, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Maiduguri - Damasak Road, Gobio 1, Borno State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 8, Adetokunbo Ademola Crescent, Maitama, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 5, Plot 2028 Dalaba St, Wuse 904101, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "7 Moundou St, Wuse 2904101, Abuja, FCT.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 79 Ralph Shodeinde St, Central Business District 900103, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                // Federal Ministry of Sports Development
                [
                    "name" => "Federal Secretariat Complex, Phase II, Shehu Shagari Way, Central Business District, Abuja,Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                //  sports commission AGENCIES
                [
                    "name" => "Ground Floor Federal Secretariat Complex, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],


                    // Location of Ministry of Arts, Culture and Creative Economy/Tourism
                [
                    "name" => "Radio House, Herbert Macaulay Way, Area 10, P.M.B. 247, Garki Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    // LOCATION OF AGENCIES UNDER ARTS AND CULTURE
                [
                    "name" => "No. 23 Kigoma Street, Wuse, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 20, Alexandria Crescent, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Block C, First floor, Federal Secretariat, Head of Service, Abuja, Federal Capital Territory 900211",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4th Floors, Block C, Phase II Federal Secretariat Complex Alh. Shehu Shagari Way, Garki 2, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Iganmu, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1370 Ukpo Close, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "36/38 Broad St, Lagos, Lagos State, 102263",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "near Costain B/stop coming from CMS, Lagos-Badagry Express way, Apapa road, Ijora Cause way",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Old Federal Secretariat, Area 1, Garki, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "6 Mike Akhigbe way, Jabi, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                //  Location of Ministry of Information and National Orientation
                    ["name" => "Radio House, Herbert Macaulay Way, Garki II, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                        // TO ADD THE AGENCIES LOCATIONS OF THE MINISTRY


                        // FEDERAL MINISTRY OF WOMEN AFFAIRS
                [
                    "name" => "2nd Floor (201-224), Annex 3, New Federal Secretariat Complex, Shehu Shagari Way,P.M.B. 229, Central Area, AbujaFCT",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    // LOCATION OF AGENCIES UNDER WOMEN  AFFAIRS
                [
                    "name" => "Tafawa Balewa Way, Central Business Dis, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                // FEDERAL MINISTRY OF FINANCE & ECONOMIC DEVELOPMENT
                [
                    "name" => "(Opposite Central Bank) P.M.B. 14, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // LOCATION OF AGENCIES UNDER FINANCE
                [
                    "name" => "12, Port Harcourt Crescent Off Gimbiya Street, Area 11, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 3, 4 Abijan St, Wuse, Abuja 904101, Federal Capital Territory, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 447/448 Constitution Avenue,Central Business District,P.M.B. 532, Garki Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot, 1570 Samuel Ladoke Akintola Boulevard, Garki 2 900103, Abuja, Federal Capital Territory, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1042 Kur Mohammed Avenue, Central Business Dis, Abuja, Nigeria, Abuja, Federal Capital Territory
                    ",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "25 Harold Sodipo Cres, Ikeja GRA 101233, Ikeja, Nigeria, Ikeja, Lagos State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Sec Towers Plot 272, Samuel Adesujo Ademulegun Street, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4th floor, Plot, The Clan Place, 1386A Tigris Cres, Maitama 904101, Abuja, Federal Capital Territory, Nigeria, Abuja, Federal Capital Territory 900271",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4th floor, Plot, The Clan Place, 1386A Tigris Cres, Maitama 904101, Abuja, Federal Capital Territory, Nigeria, Abuja, Federal Capital Territory 900271",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3rd Floor Sinoki House, Central Business District, Abuja 900211",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "The Clan Place, Plot 1386A Tigris Cres, Maitama 900271, Abuja, Nigeria, Abuja, Federal Capital Territory 900271",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Constitution Avenue 447/448, Abuja, Federal Capital Territory, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 2105, Herbert Macaulay Way, Wuse, Zone 6, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Samuel Ladoke Akintola Boulevard Plot 1239, Abuja, Federal Capital Territory 900001",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],


                    // FEDERAL MINISTRY OF INFORMATION AND CULTURE
                [
                    "name" => "Radio House, P.M.B. 247, 2nd/3rd/6th Floors Herbert Macaulay Road, Garki (opp. IntI.Conference Centre), Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                // LOCATION OF AGENCIES UNDER INFORMATION & CULTURE
                [
                    "name" => "Beside FCTA, Area 11, Garki, FCT, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "26, Bissau Street, Zone 6, PMB, 377, Garki, Wuse, Abuja, FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "APCON House, National Theatre Annex, Iganmu, Lagos, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Block B, Fed Secretariat Complex, Area 1, Garki, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1386 Oda Crescent, off Aminu Kano Crescent, Wuse II, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 20 Ibrahim Taiwo Street, Asokoro. City, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "2FWJ+HV, Central Business Dis, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Area 10, Garki, P.M.B. 452 Abuja, Abuja FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
],

                    // FEDERAL MINISTRY OF PETROLEUM RESOURCES
                [
                    "name" => "Federal Secretariat, Shehu Shagari Way, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // PETROLEUM AGENCIES
                [
                    "name" => "NNPC Towers, Herbert Macaulay Way, Central Business District, Garki, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 564/565 Airport Road, Central Business District, P.M.B 559, Garki, Abuja, FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "2 Memorial Close, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Nigerian Content Tower, Oxbow Lake Road, Swali, Yenagoa, Bayelsa State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1012 Cadastral Zone A00, Garki, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "7, Sylvester Ugoh Crescent, Jabi District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1 PTI Road, Effurun, Delta State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Block D, NNPC Towers, Herbert Macaulay Way, Central Business District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                     // LOCATION OF FEDERAL MINISTRY OF YOUTH DEVELOPEMNT
                [
                    "name" => "New Federal Secretariat Complex, Maitama, Sule, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    // LOCATIONS OF AGENCIES UNDER YOUTH DEVELOPEMNT  -->
                [
                    "name" => "Plot 416, Tigris Crescent Off Aguiyi Ironsi Street, Maitama. PMB 138, Garki ,Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1075 Joseph Gomwalk St, Gudu, Abuja 900110, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],


                    // FEDERAL MINISTRY OF POWER & STEEL
                [
                    "name" => "New Fed. Secretariat Complex 3rd,4th Floors, Annex B Shehu Shagari Way, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    //  POWER & STEEL AGENCIES
                [
                    "name" => "Plot 1387, Cadastral Zone A00, Central Business District, Abuja, FCT, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "14, Zambezi Crescent,. Maitama, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4 Dar-Es-Salam St, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No 22, Freetown Street, Wuse 2, Abuja, FCT, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone 1, 6 Bumbuna St, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Idu Industrial Area, Plot 21, Cadastral Zone, Mbora District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "274 Wole Olanipekun St, Central Business Dis, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Federal Secretariat Complex, Ahmadu Bello Way, Central Business District, Abuja, FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1490 Samuel Ademulegun Ave, Central Business District, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1387, Cadastral Zone, Opposite Reiz Continental Hotel, Central Business District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                // LOCATION OF FEDERAL MINISTRY OF AVIATION
                [
                    "name" => "Fed. Secretariat, Shehu Shagari Way, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // LOCATION OF AGENCIES UNDER AVIATION
                [
                    "name" => "Murtala Muhammed Airport, PMB 21607, Ikeja-Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 6 Ogobia Close, Off Arochukwu Street, Garki 2, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Nigerian College of Aviation Technology. Zaria, Kaduna State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Nnamdi Azikiwe International Airport, Federal Capital Territory, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "National Weather Forecasting and Research Center, Abuja, Abuja Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "P.M.B 016, Murtala Muhammed International Airport, Ikeja, Lagos, Nigeria. ENUGU OFFICE Akanu Ibiam International Airport, Enugu, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                    // LOCATION OF FEDERAL MINISTRY OF TRANSPORT
                [
                    "name" => "2nd Floor, Annex 3, New Fed. Secretariat Complex, Shehu Shagari Way, Central Area,",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                    // LOCATION OF AGENCIES UNDER TRANSPORT
                [
                    "name" => "1, Okeira Road, Railway Compound, Ebute-Metta, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "24 Jaiyeola Ajatta Street, Ajao Estate, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Basawa Road, Zaria, Kaduna State Nige",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                    // FEDERAL MINISTRY OF SCIENCE AND TECHNOLOGY
                [
                    "name" => "9th Floor New Fed. Government Secretariat (Opp. New Parade Ground), Shehu Shagari Way, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // SCIENCE AND TECHNOLOGY AGENCIES
                [
                    "name" => "Plot 701C, Central Business District,. FCT-Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "1 Surame Rd, Ungwan Rimi, Kaduna, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "9 Kofo Abayomi street, Victoria Island, Lagos, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3 Independent Layout, Independence Layout, Lagos 101232, Enugu",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "10, NBRRI Way/I.T. Igbani Street, Jabi, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "NASRDA Obasanjo Space Center, Umaru Musa Yar'Adua express way, Abuja, FCT,",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "10 Zambezi Crescent, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "17 Aguiyi Ironsi Street Abuja, Maitama, District Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Sheda CL., Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "2C86+X9W, Ring Rd 2, Karonmajigi 900108, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3, FIIRO Road, Via Cappa Bus Stop, Off Agege Motor Road, Oshodi, P.M.B 21023, Ikeja, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Area 11, Opp. NNPC Quarters, 3, PMB 715 Dunukofia St, Garki, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "4 Blantyre Street, Off Adetokunbo Ademola Crescent, Wuse II, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Umaru Musa Ya'adua Way, Lugbe, Airport Road, Abuja- Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Federal Ministry of Innovation, Science and Technology, Federal Secretariat Complex, Phase II, Chibiri 900105, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "5M64+7W7, 3 Leather Research Road, Zaria 810106, Kaduna",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 4, Old Kano Road, Basawa, Zaria, Kaduna State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                        // Location of Federal Ministry of Labour, Employment and Productivity
                [

                    "name" => "Federal Secretariat Complex, Phase I, Shehu Shagari Way, Central Business District, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    // LOCATION OF LABOUR AGENCIES
                [
                    "name" => "259 Samuel Ademulegun Ave, opposite National Mosque, Central Business Dis, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 7, Ajase-Ipo Road, Olunlade, Ilorin. Kw/St PMB 1524, Ilorin, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1529, Nouakchott Street, Zone 1, Wuse District FCT-Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "7 Cape Town, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "12, MOBOLAJI BANK ANTHONY WAY, MARYLAND IKEJA,",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                        // LOCATION OF FEDERAL MINISTRY OF INDUSTRY, TRADE AND INVESTMENT

                [
                    "name" => "23 Old Federal Secretariat, Durumi, Abuja 900103, Federal Capital Territory",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // LOCATIONS OF AGENCIES UNDER INDUSTRY
                [
                    "name" => "Corporate Headquarters. Plot 420, Tigris Crescent, Off Aguiyi Ironsi Street, Maitama, Abuja. Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "6 Adetokunbo Ademola Cres, Maitama, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "3rd Floor, Block B, Plot 1181, Aguiyi Ironsi Street, Maitama District, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone A6, No. 2 Zambezi Crescent, off Aguiyi Ironsi St, Cadastral, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 424, Aguiyi Ironsi Street, Maitama, Abuja, Nigeria P. M. B. 133 Garki, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "13 David Ejoor, Gudu, Abuja 900110, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Sugar House, 45 Oro-ago Crescent, Off Mohammadu Buhari Way, Garki 2, Abuja 900104",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Marble House, Federal Ocean Terminal (FOT), PMB 5474, Onne Port Complex, Rivers State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Zone C16, Industrial Area 1 Ext, Plot 900 Chris Chigbo Rd, Cadastral, Idu, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Trade Fair Complex, P.M.B. 0199, Lagos-Badagry Expressway, Lagos, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "52, Lome Crescent, Zone 7, Wuse, Abuja, FCT. Technical Committees.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "SON, 13/14 Victoria Arobieke Street, Off Admiralty Way, Lekki Phase I",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Bank of Industry, 2nd & 3rd Floors, Tower II, off Herbert Macaulay way, Central Business District, Abuja 900211, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "23 Marina Street P.M.B 12855 Lagos Island, Lagos Lagos State Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Headquarters Plot 1105, Dar-es-Salaam Street Off Aminu Kano Crescent, Wuse II, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Tafawa Balewa Square Complex, 45/57 Massey, Bamgbose St, Lagos Island, Lagos",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1181 Aguiyi Ironsi St, Wuse, Abuja 904101, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                // LOCATION OF FEDERAL MINISTRY OF AGRICULTURE AND  Food Security
                [
                    "name" => "Fed. Capital Territory Office Complex Block A, Area 11 (Eleven) P.M.B. 135, Garki, Abuja, FCT",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // LOCATIONS OF AGENCIES UNDRER AGRICULTURE
                [
                    "name" => "81, Ralph Shodeinde Street, Central Business District, abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No, 1 Yakubu Gowon Way, P.M.B 2155, Kaduna -Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "KM 18, ILORIN-AJASE-IPO ROAD, P.M.B 1343 ILORIN, KWARA STATE",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 590 Zone A O Central Area, Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Km 29, Abuja-Lokoja Expressway Sheda, FCT",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Agricultural Research House, Plot 223D Cadastral Zone B6, Mabushi, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 1882 C13, Kabusa,off Sunny vale Junction, Okanje District, Abuja P. O. Box 15656, Wuse, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Ijebu Ode Road Idi Ayunre, Ibadan, Nigeria, Olokuta, Oyo State",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No 8 Abdullahi Ibrahim Street, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No. 8, Zambezi Crescent. Maitama District. PMB 433, Garki PO, Abuja.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No 2a Usman Danfodio Crescent Aso Villa, FCTA, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Agricultural Research House, Plot 223D, Cadastral Zone B6 Mabushi, P.M.B. 5026 Abuja Nigeria Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                    // Location of Federal Ministry of Interior
                [

                    "name" => "Old Federal Secretariat Complex, Area 1, Garki, Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // LOCATION OF AGENCIES UNDER INTERIOR

                [
                    "name" => "Office Of The Secretary to the Government of the Federation,Shehu Shagari Complex,Three Arms Zone, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "Federal Secretariat Complex,Phase II, Shehu Shagari Way, Three Arms Zone, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "No. 11 Suleiman Barau Crescent Presidential Villa, Abuja.",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "Old Federal Secretariat Area 1,Garki Abuja FCT Abuja, Nigeria",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "Bill Clinton Drive, Airport Road, Abuja, Abuja, Federal Capital Territory",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "Nnamdi Azikiwe Airport Road, Abuja, Federal Capital Territory",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "B Zone Headquarters, Zone 3, Muhammadu Buhari Way, Abuja, Federal Capital Territory 900103",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "Beside NIS HQ, Nnamdi Azikiwe Airport Road, Sauka Abuja. P.M.B 301 Garki",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                [
                    "name" => "No 12, Sokode Crescent, Off Dalaba St, Wuse 5, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                            // LOCATION OF FEDERAL MINISTRY OF COMMUNICATIONS AND DIGITAL ECONOMY
                [
                    "name" => "Federal Secretariat, 2nd & 3rd Floors, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],
                         // LOCATION OF AGENCIES UNDER COMMUNICATION AND DIGITAL ECONOMY
                [
                    "name" => "No. 28 Port-Harcourt Crescent, Abuja, Federal Capital Territory 900247",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "No.12 Clement Isong Street, Asokoro, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "61, Ademola Adetokunbo Crescent, Abuja, Federal Capital Territory 900288",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Space Centre, Olusegun Obasanjo Way, Garki, Abuja 900108, Federal Capital Territory, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Nipost Corporate Headquarters Abubakar Musa Argungu House Plot 1279 Muhammadu Buhari Way PMB 12537 Garki 900001 Abuja, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 423 Aguiyi Ironsi Street, Maitama, Abuja, FCT 900271",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Head Office Building,Plot 423 Aguiyi Ironsi Street Maitama,, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],

                    // FEDERAL MINISTRY OF FOREIGN AFFAIRS
                [
                    "name" => "Maputo Str., Wuse, Zone 3 (Opposite Nigeria Customer Services), P.M.B. 130, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                    // TO ADD THE AGENCIES LOCATIONS OF THE MINISTRY

                    // LOCATION OF FEDERAL MINISTRY OF DEFENCE
                [
                    "name" => "Defence Headquarters Opp. Agura Hotel P.M.B. 196, Area 7, Garki, Abuja",
                    "relation_id" => 1,
                    "source" => "Ministry"
                ],

                // LOCATIONS OF AGENCIES UNDER DEFENCE
                [
                    "name" => "Mohammadu Buhari Way, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Defense Intelligence College, karu, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Mohammadu Buhari Way, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Plot 138, Yakubu Gowon Crescent,Asokoro, Abuja, Nigeria.",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Mohammadu Buhari Way, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Mohammadu Buhari Way, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Mohammadu Buhari Way, Garki, Abuja, Nigeria, Abuja, Federal Capital Territory",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "43 Oshodi - Oworonshoki Express Way Service Ln, Orile Oshodi 102215, Lagos, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "G01 Zakaria Maimalari Street, Central Business District, Abuja",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "35 km (22 mi) northeast of Kaduna in the Igabi Local Government Area (LGA) of Kaduna State, Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Dutse Alhaji ? Kubwa, Abuja, Federal Capital Territory 901101",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "Dicon House, 6b Ahmadu Bello Way, Kaduna, Kaduna",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],
                [
                    "name" => "NDA PMB 2109, Kaduna, Kaduna State Nigeria",
                    "relation_id" => 2,
                    "source" => "Agency"
                ],



            ],


            ["id"], // Unique key for checking duplicates
            ["name", "relation_id", "source"] // Columns to update if a record exists
        );
    }
}
