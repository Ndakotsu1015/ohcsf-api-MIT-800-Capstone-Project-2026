<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;
use DB;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agencies')->upsert([

            // Office of the Head of the Civil Service of the Federation
            ["id" =>1, "name"=> "The Administrative Staff College of Nigeria (ASCON)", "ministry_id" => 1],
            ["id" =>2, "name"=> "Public Service Institute of Nigeria (PSIN)", "ministry_id" => 1],
            ["id" =>3, "name"=> "Federal Training Centres (FTCs)", "ministry_id" => 1],

               // Federal Ministry of Mines and Steel Development
            ["id" =>4, "name"=> "Ajaokuta Steel Company Limited (ASCL)", "ministry_id" => 2],
            ["id" =>5, "name"=> "Metallurgical Training Institute (MTI)", "ministry_id" => 2],
            ["id" =>6, "name"=> "National Steel Raw Materials Exploration Agency (NSRMEA)", "ministry_id" => 2],
            ["id" =>7, "name"=> "National Metallurgical Development Centre (NMDC)", "ministry_id" => 2],
            ["id" =>8, "name"=> "National Iron Ore Mining Company (NIOMCO) formerly known as Associated Ores Mining Company (AOMC)", "ministry_id" => 2],

               // Federal Ministry of Water Resources and Sanitation
            ["id" => 9, "name" => "Nigeria Hydrological Services Agency (NHSA)", "ministry_id" => 3],
            ["id" => 10, "name" =>  "Nigeria Integrated Water Resources Management Commission (NIWRMC)", "ministry_id" => 3],
            ["id" => 11, "name" => "Lower Benue River Basin Development Authority (LBRBDA)", "ministry_id" => 3],
            ["id" => 12, "name" =>  " Upper Niger River Basin Development Authority", "ministry_id" => 3],
            ["id" => 13, "name" =>  " Benin-Owena River basin Development Authority", "ministry_id" => 3],
            ["id" => 14, "name" => "Upper Benue River Basin Development Authority", "ministry_id" => 3],
            ["id" => 15, "name" => "Anambra-Imo River Basin Management Authority (AIRBDA)", "ministry_id" => 3],
            ["id" => 16, "name" => "National Water Resources Institute (NWRI)", "ministry_id" => 3],
            ["id" => 17, "name" =>  "Niger Delta River Basin Development Authority (NDBDA)", "ministry_id" => 3],
            ["id" => 18, "name" =>  "Ogun-Osun River Basin Development Authority (OORBDA)", "ministry_id" => 3],
            ["id" => 19, "name" => "Gurara Dam Management Agency (GDMA)" , "ministry_id" => 3],
            ["id" => 20, "name" => "Chad Basin River Basin Development Authority", "ministry_id" => 3],
            ["id" => 21, "name" => "Sokoto-Rima River Basin Development Authority", "ministry_id" => 3],
            ["id" => 22, "name" => "Cross River River Basin Development Authority", "ministry_id" => 3],
            ["id" => 23, "name" => "Hadejia Jama’are River Basin Development Authority", "ministry_id" => 3],
            ["id" => 24, "name" => "Lower Niger River Basin Development Authority (LNRBDA)", "ministry_id" => 3],

            // Federal Ministry of Housing & Urban Development
            ["id" => 25, "name" => "National Housing Programme", "ministry_id" => 4],
            ["id" => 26, "name" => "Federal Housing Authority", "ministry_id" => 4],
            ["id" => 27, "name" => "Federal Mortgage Bank of Nigeria", "ministry_id" => 4],
            ["id" => 28, "name" => "Surveyors Registration Council of Nigeria", "ministry_id" => 4],
            ["id" => 29, "name" => "Office of the Surveyor General of the Federation", "ministry_id" => 4],
            ["id" => 30, "name" => "Architects Registration Council of Nigeria", "ministry_id" => 4],
            ["id" => 31, "name" => "Council of Registered Builders of Nigeria", "ministry_id" => 4],
            ["id" => 32, "name" => "Quantity Surveyors Registration Board of Nigeria", "ministry_id" => 4],

             //Federal Ministry of Environment
              ["id" => 33, "name" => "Environmental Health Council of Nigeria (EHCON) ", "ministry_id" => 5],
              ["id" => 34, "name" => "Forestry Research Institute of Nigeria", "ministry_id" => 5],
              ["id" => 35, "name" => "Great Green Wall Agency", "ministry_id" => 5],
              ["id" => 36, "name" => "National Environmental Standards Regulatory & Enforcement Agency", "ministry_id" => 5],
              ["id" => 37, "name" => "National Oil Spill Detection & Response Agency", "ministry_id" => 5],
              ["id" => 38, "name" => "National Park Services", "ministry_id" => 5],
              ["id" => 39, "name" => "Isiala Ngwa South", "ministry_id" => 5],
              ["id" => 40, "name" => "National Biosafety Management Agency", "ministry_id" => 5],

              // Federal Ministry of Justice
            ["id" => 41, "name" => "Council for Legal Education (Nigeria Law School)", "ministry_id" => 6],
            ["id" => 42, "name" => "National Drug Law Enforcement Agency (NDLEA)", "ministry_id" => 6],
            ["id" => 43, "name" => "Nigerian Copyright Commission", "ministry_id" => 6],
            ["id" => 44, "name" => "Legal Aid Council of Nigeria", "ministry_id" => 6],
            ["id" => 45, "name" => "Nigerian Institute of Advanced Legal Studies", "ministry_id" => 6],
            ["id" => 46, "name" => "Regional Centre for International Commercial Arbitration", "ministry_id" => 6],
            ["id" => 47, "name" => "National Agency for the Prohibition of Traffic in Persons (NAPTIP)", "ministry_id" => 6],
            ["id" => 48, "name" => "Nigeria Law Reform Commission", "ministry_id" => 6],
            ["id" => 49, "name" => "National Human Right Commission", "ministry_id" => 6],
            ["id" => 50, "name" => "Nigeria Law Reform Commission", "ministry_id" => 6],
            ["id" => 51, "name" => "National Human Right Commission", "ministry_id" => 6],

            // Federal Ministry of Education
            ["id" => 52, "name" => "National Board for Technical Education (NBTE)", "ministry_id" => 7],
            ["id" => 53, "name" => "Universal Basic Education Commission (UBEC)", "ministry_id" => 7],
            ["id" => 54, "name" => "Computer Professionals Registration Council of Nigeria (CPN)", "ministry_id" => 7],
            ["id" => 55, "name" => "Tertiary Education Trust Fund (TET FUND)", "ministry_id" => 7],
            ["id" => 56, "name" => "Tertiary Education Trust Fund (TET FUND)", "ministry_id" => 7],
            ["id" => 57, "name" => "Nigerian Mathematical Centre (NMC)", "ministry_id" => 7],
            ["id" => 58, "name" => "Nigerian Arabic Language Village (NALV)", "ministry_id" => 7],
            ["id" => 59, "name" => "Federal Scholarship Board (FSB)", "ministry_id" => 7],
            ["id" => 60, "name" => "National Library of Nigeria (NLN)" , "ministry_id" => 7],
            ["id" => 61, "name" => "Teachers’ Registration Council of Nigeria (TRCN)", "ministry_id" => 7],
            ["id" => 62, "name" => "National Institute for Nigerian Languages (NINLAN)", "ministry_id" => 7],
            ["id" => 63, "name" => "National Teachers Institute (NTI)", "ministry_id" => 7],
            ["id" => 64, "name" => "National Institute for Educational Planning & Administration (NIEPA)", "ministry_id" => 7],
            ["id" => 65, "name" => "National Business and Technical Examinations Board (NABTEB)", "ministry_id" => 7],
            ["id" => 66, "name" => "Joint Admissions and Matriculation Board (JAMB)", "ministry_id" => 7],
            ["id" => 67, "name" => "National Board for Arabic and Islamic Studies (NBAIS)", "ministry_id" => 7],
            ["id" => 68, "name" => " National Universities Commission (NUC)", "ministry_id" => 7],
            ["id" => 69, "name" => "Nigerian Educational Research Development Council (NERDC)", "ministry_id" => 7],
            ["id" => 70, "name" => " West African Examination Council (WAEC)", "ministry_id" => 7],
            ["id" => 71, "name" => "Nigerian French Language Village (NFV)", "ministry_id" => 7],
            ["id" => 72, "name" => "National Commission for Adult Education Mass Literacy and Non-Formal Education (NMEC)", "ministry_id" => 7],
            ["id" => 73, "name" => "National Examination Council (NECO)", "ministry_id" => 7],
            ["id" => 74, "name" => "Librarians’ Registration Council of Nigerian (LRCN)", "ministry_id" => 7],

              // Federal Ministry of Budget and Economic Planning
            ["id" =>75, "name"=> "Budget Office", "ministry_id" => 8],
            ["id" =>76, "name"=> "Center for Management Development", "ministry_id" => 8],
            ["id" =>77, "name"=> "National Bureau of Statistics", "ministry_id" => 8],
            ["id" =>78, "name"=> "NISER", "ministry_id" => 8],

             // Federal Ministry of Works
            ["id" => 79, "name" => "Surveyors Council of Nigeria (SURCON)", "ministry_id" => 9],
            ["id" => 80, "name" => "Council of Regulation of Engineering in Nigeria (COREN)", "ministry_id" => 9],
            ["id" => 81, "name" => "Federal Road Maintenance Agency (FERMA)", "ministry_id" => 9],

              // Federal Ministry of Health and Social Welfare
              ["id" => 82, "name" => "National Health Insurance Authority", "ministry_id" => 10],
              ["id" => 83, "name" => "Nation Agency For Food And Drug Administration And Control", "ministry_id" => 10],
              ["id" => 84, "name" => "Nigerian Institute of Medical Research", "ministry_id" => 10],
              ["id" => 85, "name" => " National Primary Healthcare Development Agency", "ministry_id" => 10],
              ["id" => 86, "name" => "Nigeria Centre For Disease Control And Prevention", "ministry_id" => 10],
              ["id" => 87, "name" => " National Institute For Pharmaceutical Research And Development", "ministry_id" => 10],

              // Ministry of Solid Minerals Development
              ["id" => 88, "name" => "Nigeria Mining Cadastre Office (NMCO)", "ministry_id" => 11],
              ["id" => 89, "name" => "Nigeria Geological Survey Agency (NGSA)", "ministry_id" => 11],
              ["id" => 90, "name" => " Mines Inspectorate Department", "ministry_id" => 11],
              ["id" => 91, "name" =>  "Artisanal and Small-Scale Mining (ASM) Development Department", "ministry_id" => 11],
              ["id" => 92, "name" => "Mines Environmental Compliance Department", "ministry_id" => 11],
              ["id" => 93, "name" => " National Mineral Resources Development Council (NMRC)", "ministry_id" => 11],
              ["id" => 94, "name" => "Solid Minerals Development Fund (SMDF)", "ministry_id" => 11],

               // Federal Ministry of Marine and Blue Economy
              ["id" =>95, "name"=> "  Nigerian Maritime Administration and Safety Agency (NIMASA)", "ministry_id" => 12],
              ["id" =>96, "name"=> "  Nigerian Ports Authority (NPA)", "ministry_id" => 12],
              ["id" =>97, "name"=> "  National Inland Waterways Authority (NIWA)", "ministry_id" => 12],
              ["id" =>98, "name"=> "  Shippers Council", "ministry_id" => 12],
              ["id" =>99, "name"=> "  Maritime Academy of Nigeria", "ministry_id" => 12],
              ["id" =>100, "name"=> "  Council for Regulation of Freight Forwarding of Nigeria", "ministry_id" => 12],

              // Federal Ministry of Humanitarian Affairs And Poverty Alleviation
              ["id" =>101, "name"=> "National Commission for Refugees, Migrants and Internally Displaced Persons", "ministry_id" => 13],
              ["id" =>102, "name"=> "North East Development Commission", "ministry_id" => 13],
              ["id" =>103, "name"=> "National Emergency Management Agency", "ministry_id" => 13],
              ["id" =>104, "name"=> "National Agency for Prohibition and Trafficking In Persons", "ministry_id" => 13],
              ["id" =>105, "name"=> "National Senior Citizens Centre", "ministry_id" => 13],
              ["id" =>106, "name"=> "National Commission for Persons with Disabilities", "ministry_id" => 13],

              // National Sports Commission of Federal Ministry of Sports Development
              ["id" =>107, "name"=> "National Sports Commission", "ministry_id" => 14],

              // Ministry of Arts, Culture And Creative Economy/Tourism
              ["id" =>108, "name"=> "National Institute for Cultural Orientation (NICO)", "ministry_id" => 15],
              ["id" =>109, "name"=> "National Film and Video Censors Board (NFVCB)", "ministry_id" => 15],
              ["id" =>110, "name"=> "National Commission for Museums and Monuments (NCMM)", "ministry_id" => 15],
              ["id" =>111, "name"=> "National Gallery of Art, NGA", "ministry_id" => 15],
              ["id" =>113, "name"=> "National Theatre", "ministry_id" => 15],
              ["id" =>114, "name"=> "National Council for Arts and Culture (NCAC)", "ministry_id" => 15],
              ["id" =>115, "name"=> "Centre for Black and African Arts and Civilization", "ministry_id" => 15],
              ["id" =>116, "name"=> "National Troupe of Nigeria", "ministry_id" => 15],
              ["id" =>117, "name"=> "Nigerian Tourism Development Authority", "ministry_id" => 15],
              ["id" =>118, "name"=> "National Institute for Hospitality and Tourism", "ministry_id" => 15],

              // Ministry of Information and National Orientation
              ["id" => 119, "name" => "Federal Radio Corporation of Nigeria", "ministry_id" => 16],
              ["id" => 120, "name" => "National Broadcasting Commission", "ministry_id" => 16],
              ["id" => 121, "name" => "Advertising Practitioners Council Of Nigeria", "ministry_id" => 16],
              ["id" => 122, "name" => "News Agency Of Nigeria", "ministry_id" => 16],
              ["id" => 123, "name" => "Nigerian Press Council", "ministry_id" => 16],
              ["id" => 124, "name" => "Nigeria Television Authority", "ministry_id" => 16],
              ["id" => 125, "name" => "Voice Of Nigeria", "ministry_id" => 16],

            // Federal Ministry of Women Affairs
              ["id" => 126, "name" => "National Centre For Women Development (NCWD)", "ministry_id" => 17],

              // Federal Ministry of Finance
              ["id" =>127, "name"=> "Federal Inland Revenue Service (FIRS)", "ministry_id" => 18],
              ["id" =>128, "name"=> "Nigeria Customs Service (NCS)", "ministry_id" => 18],
              ["id" =>129, "name"=> "Debt Management Office (DMO)", "ministry_id" => 18],
              ["id" =>130, "name"=> "Office of the Accountant-General of the Federation", "ministry_id" => 18],
              ["id" =>131, "name"=> "Nigerian Export-Import Bank [NEXIM],", "ministry_id" => 18],
              ["id" =>132, "name"=> "Investments and Securities Tribunal", "ministry_id" => 18],
              ["id" =>133, "name"=> "Securities and Exchange Commission (SEC)", "ministry_id" => 18],
              ["id" =>134, "name"=> "Nigerian Sovereign Investment Authority", "ministry_id" => 18],
              ["id" =>135, "name"=> "Pension Transitional Arrangement Directorate", "ministry_id" => 18],
              ["id" =>136, "name"=> "Family Homes Fund", "ministry_id" => 18],
              ["id" =>137, "name"=> "Development Bank of Nigeria (DBN)", "ministry_id" => 18],
              ["id" =>138, "name"=> "Nigeria Deposit Insurance Corporation (NDIC)", "ministry_id" => 18],
              ["id" =>139, "name"=> "National Economic Reconstruction Fund (NERF)", "ministry_id" => 18],
              ["id" =>140, "name"=> "National Insurance Commission (NIC)", "ministry_id" => 18],

            // Federal Ministry of Information and Culture
            ["id" => 141, "name" => "Nigeria Television Authority (NTA)" , "ministry_id" => 19],
            ["id" => 142, "name" => "Nigerian Press Council (NPC)", "ministry_id" => 19],
            ["id" => 143, "name" => "Advertising Practitioners Council of Nigeria (APCON)", "ministry_id" => 19],
            ["id" => 144, "name" => "National Orientation Agency (NOA)", "ministry_id" => 19],
            ["id" => 145, "name" => "Voice of Nigeria (VON)", "ministry_id" => 19],
            ["id" => 146, "name" => "National Broadcasting Commission (NBC)", "ministry_id" => 19],
            ["id" => 147, "name" => " News Agency of Nigeria (NAN)", "ministry_id" => 19],
            ["id" => 148, "name" => "Federal Radio Corporation of Nigeria (FRCN)", "ministry_id" => 19],

            // Ministry of Petroleum Resources
            ["id" => 149, "name" => "Nigerian National Petroleum Company Limited (NNPCL)", "ministry_id" => 20],
            ["id" => 150, "name" => "Nigerian Nuclear Regulatory Authority (NNRA)", "ministry_id" => 20],
            ["id" => 151, "name" => "Petroleum Technology Development Fund (PTDF)", "ministry_id" => 20],
            ["id" => 152, "name" => "Nigerian Content Development Monitoring Board (NCDMB)", "ministry_id" => 20],
            ["id" => 153, "name" => "Nigerian Midstream and Downstream Petroleum Regulatory Authority (NMDPRA)", "ministry_id" => 20],
            ["id" => 154, "name" => "Nigerian Upstream Petroleum Regulatory Commission (NUPRC)", "ministry_id" => 20],
            ["id" => 155, "name" => "Petroleum Training Institute (PTI)", "ministry_id" => 20],
            ["id" => 156, "name" => "Ministry of Petroleum Incorporated (MOPI)", "ministry_id" => 20],

            // Federal Ministry of Youth Development
            ["id" => 157, "name" => "Citizenship & Leadership Training Centre (CLTC)", "ministry_id" => 21],
            ["id" => 158, "name" => "National Youth Service Corps (NYSC)​", "ministry_id" => 21],

            // Federal Ministry of Power
            ["id" =>159, "name" => "Nigerian Electricity Regulatory Commission (NERC)", "ministry_id" => 22],
            ["id" =>160, "name" => "Transmission Company of Nigeria (TCN)", "ministry_id" => 22],
            ["id" =>161, "name" => "Nigerian Electricity Management Services Agency (NEMSA)", "ministry_id" => 22],
            ["id" =>162, "name" => "Rural Electrification Agency (REA)", "ministry_id" => 22],
            ["id" =>163, "name" => "Nigerian Electricity Liability Management Company (NELMCO)", "ministry_id" => 22],
            ["id" =>164, "name" => "National Power Training Institute (NAPTIN)", "ministry_id" => 22],
            ["id" =>165, "name" => "Nigerian Bulk Electricity Trading PLC (NBET)", "ministry_id" => 22],
            ["id" =>166, "name" => "Presidential Task Force on Power", "ministry_id" => 22],
            ["id" =>167, "name" => "Niger Delta Power Holding Company (NDPHC)", "ministry_id" => 22],
            ["id" =>168, "name" => "Nigeria Power Finance", "ministry_id" => 22],

            // Federal Ministry of Aviation
            ["id" =>169, "name" => "Federal Airports Authority of Nigeria", "ministry_id" => 23],
            ["id" =>170, "name" => "Nigerian Airspace Management Agency", "ministry_id" => 23],
            ["id" =>171, "name" => "Nigerian College of Aviation Technology", "ministry_id" => 23],
            ["id" =>172, "name" => "Nigerian Civil Aviation Authority", "ministry_id" => 23],
            ["id" =>173, "name" => "Nigerian Meteorological Agency", "ministry_id" => 23],
            ["id" =>174, "name" => "Nigerian Safety Investigation Bureau", "ministry_id" => 23],

            // Federal Ministry of Transport
            ["id" =>175, "name" => "Nigerian Railway Corporation", "ministry_id" => 24],
            ["id" =>176, "name" => "Council for Regulation of Freight Forwarding of Nigeria", "ministry_id" => 24],
            ["id" =>177, "name" => "Nigerian Institute of Transport Technology", "ministry_id" => 24],

             //Federal Ministry of Science and Technology and Innovation
            ["id" =>178, "name"=> "Energy Commission of Nigeria (ECN)", "ministry_id" => 25],
            ["id" =>179, "name"=> "Nigerian Institute For Trypanosomiasis Research (NITR)", "ministry_id" => 25],
            ["id" =>180, "name"=> "Nigeria Natural Medicine Development Agency (NNMDA)", "ministry_id" => 25],
            ["id" =>181, "name"=> "Projects Development Institute (PRODA)", "ministry_id" => 25],
            ["id" =>182, "name"=> "Nigerian Building & Road Research Institute (NBRRI)", "ministry_id" => 25],
            ["id" =>183, "name"=> "National Space Research and Development Agency (NASRDA)", "ministry_id" => 25],
            ["id" =>184, "name"=> "National Board For Technology Incubation (NBTI)", "ministry_id" => 25],
            ["id" =>185, "name"=> "Raw Materials Research and Development Council (RMRDC)", "ministry_id" => 25],
            ["id" =>186, "name"=> "Sheda Science and Technology Complex (SHESTCO)", "ministry_id" => 25],
            ["id" =>187, "name"=> "Nigerian Institute of Science Laboratory Technology (NISLT)", "ministry_id" => 25],
            ["id" =>188, "name"=> "Federal Institute of Industrial Research Oshodi (FIIRO)", "ministry_id" => 25],
            ["id" =>189, "name"=> "National Centre for Technology Management (NACETEM)", "ministry_id" => 25],
            ["id" =>190, "name"=> "National Office For Technology Acquisition and Promotion (NOTAP)", "ministry_id" => 25],
            ["id" =>191, "name"=> "National Biotechnology Development Agency (NABDA)", "ministry_id" => 25],
            ["id" =>192, "name"=> "Nigerian Council of Food Science & Technology (NiCFoST)", "ministry_id" => 25],
            ["id" =>193, "name"=> "Nigerian Institute Of Leather And Science Technology (NILEST) Zaria", "ministry_id" => 25],
            ["id" =>194, "name"=> "National Research Institute For Chemical Technology (NARICT)", "ministry_id" => 25],

            // Federal Ministry of Labour, Employment and Productivity
            ["id" =>195, "name"=> "Industrial Arbitration Panel", "ministry_id" => 26],
            ["id" =>196, "name"=> "Micheal Imoudu National Institute for Labour Studies", "ministry_id" => 26],
            ["id" =>197, "name"=> "National Directorate of Employment", "ministry_id" => 26],
            ["id" =>198, "name"=> "National Productivity Center", "ministry_id" => 26],
            ["id" =>199, "name"=> "Nigeria Social Insurance Trust Fund", "ministry_id" => 26],

            // Federal Ministry of Industry, Trade, and Investment
            ["id" =>200, "name"=> "Corporate Affairs Commission (CAC)", "ministry_id" => 27],
            ["id" =>201, "name"=> "Industrial Training Fund (ITF)", "ministry_id" => 27],
            ["id" =>202, "name"=> "Financial Reporting Council of Nigeria (FRCN)", "ministry_id" => 27],
            ["id" =>203, "name"=> "Nigeria Export Processing Zone Authority (NEPZA)", "ministry_id" => 27],
            ["id" =>204, "name"=> "Nigeria Export Promotion Council (NEPC)", "ministry_id" => 27],
            ["id" =>205, "name"=> "National Automotive Design and Development Council (NADDC)", "ministry_id" => 27],
            ["id" =>206, "name"=> "National Sugar Development Council (NSDC)", "ministry_id" => 27],
            ["id" =>207, "name"=> "Oil & Gas Free Zone Authority (OGFZA)", "ministry_id" => 27],
            ["id" =>208, "name"=> "Small & Medium Enterprises Development Agency of Nigeria (SMEDAN)", "ministry_id" => 27],
            ["id" =>209, "name"=> "Lagos International Trade Fair Complex (LITFCMB)", "ministry_id" => 27],
            ["id" =>210, "name"=> "Standard Organisation of Nigeria (SON)", "ministry_id" => 27],
            ["id" =>211, "name"=> "Standards Organisation of Nigeria Conformity Assessment Program (SONCAP)", "ministry_id" => 27],
            ["id" =>212, "name"=> "Nigerian Commodities Exchange", "ministry_id" => 27],
            ["id" =>213, "name"=> "Bank of Industry (BOI)", "ministry_id" => 27],
            ["id" =>214, "name"=> "Consumer Protection Council (CPC)", "ministry_id" => 27],
            ["id" =>215, "name"=> "Tafawa Balewa Square Management Board (TBSMB)", "ministry_id" => 27],
            ["id" =>216, "name"=> "Nigeria Investment Promotion Commission (NIPC)", "ministry_id" => 27],

            // Federal Ministry of Agriculture and Food Security
            ["id" =>217, "name"=> "Nigeria Agricultural Quarantine Service (NAQS), Abuja", "ministry_id" => 28],
            ["id" =>218, "name"=> "Bank Of Agriculture (BOA), Kaduna", "ministry_id" => 28],
            ["id" =>219, "name"=> "Agricultural And Rural Management Training Institute (ARMTI), Ilorin", "ministry_id" => 28],
            ["id" =>220, "name"=> "Nigerian Agricultural Insurance Corporation (NAIS), Abuja", "ministry_id" => 28],
            ["id" =>221, "name"=> "Nigeria Agricultural Seed Council, Abuja", "ministry_id" => 28],
            ["id" =>222, "name"=> "National Centre For Agricultural Mechanization (NCAM), Ilorin", "ministry_id" => 28],
            ["id" =>223, "name"=> "Nigeria Institute Of Animal Science (NIAS), Abuja", "ministry_id" => 28],
            ["id" =>224, "name"=> "Cocoa Research Institute of Nigeria (CRIN), Ibadan", "ministry_id" => 28],
            ["id" =>225, "name"=> "Nigeria Institute Of Soil Science (NISS), Abuja", "ministry_id" => 28],
            ["id" =>236, "name"=> "Veterinary Council Of Nigeria (VCN), Abuja", "ministry_id" => 28],
            ["id" =>237, "name"=> "National Agricultural Land Development Authority (NALDA), Abuja", "ministry_id" => 28],
            ["id" =>238, "name"=> "Agricultural Research Council Of Nigeria (ARCN), Abuja", "ministry_id" => 28],

            // Federal Ministry of Interior
            ["id" =>239, "name"=> "Office of the Secretary to the Government of the Federation (OSGF)", "ministry_id" => 29],
            ["id" =>240, "name"=> "Office of the Head of Civil Service of the Federation (OHCSF)", "ministry_id" => 29],
            ["id" =>241, "name"=> "Bureau of Public Procurement (BPP)", "ministry_id" => 29],
            ["id" =>242, "name"=> "Civil Defence, Correctional, Fire and Immigration Board (CDCFIB)", "ministry_id" => 29],
            ["id" =>243, "name"=> "Nigerian Correctional Service (NCS)", "ministry_id" => 29],
            ["id" =>244, "name"=> "Nigeria Immigration Service (NIS)", "ministry_id" => 29],
            ["id" =>245, "name"=> "Federal Fire Service (FFS)", "ministry_id" => 29],
            ["id" =>246, "name"=> "Nigeria Security and Civil Defence Corp (NSCDC)", "ministry_id" => 29],
            ["id" =>247, "name"=> "National Identity Management Commission (NIMC)", "ministry_id" => 29],

            // Federal Ministry of Communication and Digital Economy
            ["id" =>248, "name"=> "National Information Technology Development Agency (NITDA)", "ministry_id" => 30],
            ["id" =>249, "name"=> "National Data Protection Commission (NDPC)", "ministry_id" => 30],
            ["id" =>250, "name"=> "Galaxy Backbone", "ministry_id" => 30],
            ["id" =>251, "name"=> "Nigerian Communications Satellite (NIGCOMSAT)", "ministry_id" => 30],
            ["id" =>252, "name"=> "Nigerian Postal Service (NIPOST)", "ministry_id" => 30],
            ["id" =>253, "name"=> "Nigerian Communications Commission (NCC)", "ministry_id" => 30],
            ["id" =>254, "name"=> "Universal Service Provision Fund (USPF)", "ministry_id" => 30],

            // Ministry of Foreign Affairs
            ["id" =>255, "name"=> "Directorate of Technical Co-Operation in Africa", "ministry_id" => 31],
            ["id" =>256, "name"=> "Institute For Peace and Conflict Resolution", "ministry_id" => 31],
            ["id" =>257, "name"=> "Nigerian Foreign Service Academy", "ministry_id" => 31],
            ["id" =>258, "name"=> "Nigerians in Diaspora Commission", "ministry_id" => 31],
            ["id" =>259, "name"=> "Nigerian Institute of International Affairs", "ministry_id" => 31],
            ["id" =>260, "name"=> "Technical Aid Corps", "ministry_id" => 31],

            // Federal Ministry of Defence
            ["id" =>261, "name"=> "Defence Headquarters", "ministry_id" => 32],
            ["id" =>262, "name"=> "Defence Intelligence School, Lagos", "ministry_id" => 32],
            ["id" =>263, "name"=> "The Nigerian Army", "ministry_id" => 32],
            ["id" =>264, "name"=> "Defence Intelligence Agency (DIA), Asokoro, Abuja", "ministry_id" => 32],
            ["id" =>265, "name"=> "Defence Mission", "ministry_id" => 32],
            ["id" =>266, "name"=> "The Nigeria Airforce", "ministry_id" => 32],
            ["id" =>267, "name"=> "The Nigeria Navy", "ministry_id" => 32],
            ["id" =>268, "name"=> "Nigerian Armed Forces Resettlement Centre (NAFRC)", "ministry_id" => 32],
            ["id" =>269, "name"=> "National Defence College", "ministry_id" => 32],
            ["id" =>270, "name"=> "Armed Forces Command and Staff College, Jaji, Kaduna", "ministry_id" => 32],
            ["id" =>271, "name"=> "Military Pension Board, Abuja", "ministry_id" => 32],
            ["id" =>272, "name"=> "Defence Industries Corporation of Nigeria (DICON)", "ministry_id" => 32],
            ["id" =>273, "name"=> "Nigerian Defence Academy (NDA), Kaduna", "ministry_id" => 32],
        ],
        ['id'], // Unique key for checking duplicates
        ['name', 'ministry_id'] // Columns to update if a record exists
    );
}
}
