<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('PRENOM',50);
            $table->string('ADRESSE',50);
            $table->string('CODE_POSTAL',10);
            $table->string('VILLE',20);
            $table->date('DATE_EMBAUCHE');
            $table->UnsignedBigInteger('LAB_CODE');
            $table->string('email',50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('LAB_CODE')->references('id')->on('labo')->onDelete('cascade')->onUpdate('cascade');
            
        });
       $mdp =  Hash::make("123456");
        DB::table('users')->insert([                                                                                                                    
            ['name' => 'Jean', 'PRENOM' => 'François' , 'ADRESSE' => '3 Rue des Sio' , 'CODE_POSTAL' => '35478' , 'VILLE' => 'Quelquepart' , 'DATE_EMBAUCHE' => '1992-12-11' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Jacque', 'PRENOM' => 'David' , 'ADRESSE' => '1 r Chaussé au moine' , 'CODE_POSTAL' => '38100' , 'VILLE' => 'GRENOBLE' , 'DATE_EMBAUCHE' => '1991-08-26' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Bedos', 'PRENOM' => 'Christian' , 'ADRESSE' => '1 r Bénédictins' , 'CODE_POSTAL' => '65000' , 'VILLE' => 'TARBES' , 'DATE_EMBAUCHE' => '1999-01-02' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Tusseau', 'PRENOM' => 'Louis' , 'ADRESSE' => '22 r Renou' , 'CODE_POSTAL' => '86000' , 'VILLE' => 'POITIERS' , 'DATE_EMBAUCHE' => '1996-03-11' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Bentot', 'PRENOM' => 'Pascal' , 'ADRESSE' => '11 av 6 Juin' , 'CODE_POSTAL' => '67000' , 'VILLE' => 'STRASBOURG' , 'DATE_EMBAUCHE' => '1997-03-21' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Bioret', 'PRENOM' => 'Luc' , 'ADRESSE' => '1 r Linne' , 'CODE_POSTAL' => '35000' , 'VILLE' => 'RENNES' , 'DATE_EMBAUCHE' => '1999-01-31' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Bunisset', 'PRENOM' => 'Francis' , 'ADRESSE' => '10 r Nicolas Chorier' , 'CODE_POSTAL' => '85000' , 'VILLE' => 'LA ROCHE SUR YON' , 'DATE_EMBAUCHE' => '1994-07-03' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Bunisset', 'PRENOM' => 'Denise' , 'ADRESSE' => '1 r Lionne' , 'CODE_POSTAL' => '49100' , 'VILLE' => 'ANGERS' , 'DATE_EMBAUCHE' => '1994-07-03' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Cacheux', 'PRENOM' => 'Bernard' , 'ADRESSE' => '114 r Authie' , 'CODE_POSTAL' => '34000' , 'VILLE' => 'MONTPELLIER' , 'DATE_EMBAUCHE' => '2000-08-02' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Cadic', 'PRENOM' => 'Eric' , 'ADRESSE' => '123 r Caponière' , 'CODE_POSTAL' => '41000' , 'VILLE' => 'BLOIS' , 'DATE_EMBAUCHE' => '1993-12-06' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Charoze', 'PRENOM' => 'Catherine' , 'ADRESSE' => '100 pl Géants' , 'CODE_POSTAL' => '33000' , 'VILLE' => 'BORDEAUX' , 'DATE_EMBAUCHE' => '1997-09-25' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Clepkens', 'PRENOM' => 'Christophe' , 'ADRESSE' => '12 r Fédérico Garcia Lorca' , 'CODE_POSTAL' => '13000' , 'VILLE' => 'MARSEILLE' , 'DATE_EMBAUCHE' => '1998-01-18' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Cottin', 'PRENOM' => 'Vincenne' , 'ADRESSE' => '36 sq Capucins' , 'CODE_POSTAL' => '5000' , 'VILLE' => 'GAP' , 'DATE_EMBAUCHE' => '1995-10-21' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Daburon', 'PRENOM' => 'François' , 'ADRESSE' => '13 r Champs Elysées' , 'CODE_POSTAL' => '6000' , 'VILLE' => 'NICE' , 'DATE_EMBAUCHE' => '1989-02-01' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'De', 'PRENOM' => 'Philippe' , 'ADRESSE' => '13 r Charles Peguy' , 'CODE_POSTAL' => '10000' , 'VILLE' => 'TROYES' , 'DATE_EMBAUCHE' => '1992-05-05' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Debelle', 'PRENOM' => 'Michel' , 'ADRESSE' => '181 r Caponière' , 'CODE_POSTAL' => '88000' , 'VILLE' => 'EPINAL' , 'DATE_EMBAUCHE' => '1991-04-09' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Debelle', 'PRENOM' => 'Jeanne' , 'ADRESSE' => '134 r Stalingrad' , 'CODE_POSTAL' => '44000' , 'VILLE' => 'NANTES' , 'DATE_EMBAUCHE' => '1991-12-05' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Debroise', 'PRENOM' => 'Michel' , 'ADRESSE' => '2 av 6 Juin' , 'CODE_POSTAL' => '70000' , 'VILLE' => 'VESOUL' , 'DATE_EMBAUCHE' => '1997-11-18' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Desmarquest', 'PRENOM' => 'Nathalie' , 'ADRESSE' => '14 r Fédérico Garcia Lorca' , 'CODE_POSTAL' => '54000' , 'VILLE' => 'NANCY' , 'DATE_EMBAUCHE' => '1989-03-24' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Desnost', 'PRENOM' => 'Pierre' , 'ADRESSE' => '16 r Barral de Montferrat' , 'CODE_POSTAL' => '55000' , 'VILLE' => 'VERDUN' , 'DATE_EMBAUCHE' => '1993-05-17' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Dudouit', 'PRENOM' => 'Frédéric' , 'ADRESSE' => '18 quai Xavier Jouvin' , 'CODE_POSTAL' => '75000' , 'VILLE' => 'PARIS' , 'DATE_EMBAUCHE' => '1988-04-26' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Duncombe', 'PRENOM' => 'Claude' , 'ADRESSE' => '19 av Alsace Lorraine' , 'CODE_POSTAL' => '9000' , 'VILLE' => 'FOIX' , 'DATE_EMBAUCHE' => '1996-02-19' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Enault-Pascreau', 'PRENOM' => 'Céline' , 'ADRESSE' => '25B r Stalingrad' , 'CODE_POSTAL' => '40000' , 'VILLE' => 'MONT DE MARSAN' , 'DATE_EMBAUCHE' => '1990-11-27' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Eynde', 'PRENOM' => 'Valérie' , 'ADRESSE' => '3 r Henri Moissan' , 'CODE_POSTAL' => '76000' , 'VILLE' => 'ROUEN' , 'DATE_EMBAUCHE' => '1991-10-31' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Finck', 'PRENOM' => 'Jacques' , 'ADRESSE' => 'rte Montreuil Bellay' , 'CODE_POSTAL' => '74000' , 'VILLE' => 'ANNECY' , 'DATE_EMBAUCHE' => '1993-06-08' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Frémont', 'PRENOM' => 'Fernande' , 'ADRESSE' => '4 r Jean Giono' , 'CODE_POSTAL' => '69000' , 'VILLE' => 'LYON' , 'DATE_EMBAUCHE' => '1997-02-15' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Gest', 'PRENOM' => 'Alain' , 'ADRESSE' => '30 r Authie' , 'CODE_POSTAL' => '46000' , 'VILLE' => 'FIGEAC' , 'DATE_EMBAUCHE' => '1994-05-03' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Gheysen', 'PRENOM' => 'Galassus' , 'ADRESSE' => '32 bd Mar Foch' , 'CODE_POSTAL' => '75000' , 'VILLE' => 'PARIS' , 'DATE_EMBAUCHE' => '1996-01-18' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Girard', 'PRENOM' => 'Yvon' , 'ADRESSE' => '31 av 6 Juin' , 'CODE_POSTAL' => '80000' , 'VILLE' => 'AMIENS' , 'DATE_EMBAUCHE' => '1999-03-27' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Gombert', 'PRENOM' => 'Luc' , 'ADRESSE' => '32 r Emile Gueymard' , 'CODE_POSTAL' => '56000' , 'VILLE' => 'VANNES' , 'DATE_EMBAUCHE' => '1985-10-02' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Guindon', 'PRENOM' => 'Caroline' , 'ADRESSE' => '40 r Mar Montgomery' , 'CODE_POSTAL' => '87000' , 'VILLE' => 'LIMOGES' , 'DATE_EMBAUCHE' => '1996-01-13' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Guindon', 'PRENOM' => 'François' , 'ADRESSE' => '44 r Picotière' , 'CODE_POSTAL' => '19000' , 'VILLE' => 'TULLE' , 'DATE_EMBAUCHE' => '1993-05-08' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Igigabel', 'PRENOM' => 'Guy' , 'ADRESSE' => '33 gal Arlequin' , 'CODE_POSTAL' => '94000' , 'VILLE' => 'CRETEIL' , 'DATE_EMBAUCHE' => '1998-04-26' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Jourdren', 'PRENOM' => 'Pierre' , 'ADRESSE' => '34 av Jean Perrot' , 'CODE_POSTAL' => '15000' , 'VILLE' => 'AURRILLAC' , 'DATE_EMBAUCHE' => '1993-08-26' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Juttard', 'PRENOM' => 'Pierre-Raoul' , 'ADRESSE' => '34 cours Jean Jaurès' , 'CODE_POSTAL' => '8000' , 'VILLE' => 'SEDAN' , 'DATE_EMBAUCHE' => '1992-11-01' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Labouré-Morel', 'PRENOM' => 'Saout' , 'ADRESSE' => '38 cours Berriat' , 'CODE_POSTAL' => '52000' , 'VILLE' => 'CHAUMONT' , 'DATE_EMBAUCHE' => '1998-02-25' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Landré', 'PRENOM' => 'Philippe' , 'ADRESSE' => '4 av Gén Laperrine' , 'CODE_POSTAL' => '59000' , 'VILLE' => 'LILLE' , 'DATE_EMBAUCHE' => '1992-12-16' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Langeard', 'PRENOM' => 'Hugues' , 'ADRESSE' => '39 av Jean Perrot' , 'CODE_POSTAL' => '93000' , 'VILLE' => 'BAGNOLET' , 'DATE_EMBAUCHE' => '1998-06-18' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Lanne', 'PRENOM' => 'Bernard' , 'ADRESSE' => '4 r Bayeux' , 'CODE_POSTAL' => '30000' , 'VILLE' => 'NIMES' , 'DATE_EMBAUCHE' => '1996-11-21' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Le', 'PRENOM' => 'Noël' , 'ADRESSE' => '4 av Beauvert' , 'CODE_POSTAL' => '68000' , 'VILLE' => 'MULHOUSE' , 'DATE_EMBAUCHE' => '1983-03-23' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Le', 'PRENOM' => 'Jean' , 'ADRESSE' => '39 r Raspail' , 'CODE_POSTAL' => '53000' , 'VILLE' => 'LAVAL' , 'DATE_EMBAUCHE' => '1995-02-02' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Leclercq', 'PRENOM' => 'Servane' , 'ADRESSE' => '11 r Quinconce' , 'CODE_POSTAL' => '18000' , 'VILLE' => 'BOURGES' , 'DATE_EMBAUCHE' => '1995-06-05' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Lecornu', 'PRENOM' => 'Jean-Bernard' , 'ADRESSE' => '4 bd Mar Foch' , 'CODE_POSTAL' => '72000' , 'VILLE' => 'LA FERTE BERNARD' , 'DATE_EMBAUCHE' => '1997-01-24' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Lecornu', 'PRENOM' => 'Ludovic' , 'ADRESSE' => '4 r Abel Servien' , 'CODE_POSTAL' => '25000' , 'VILLE' => 'BESANCON' , 'DATE_EMBAUCHE' => '1996-02-27' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Lejard', 'PRENOM' => 'Agnès' , 'ADRESSE' => '4 r Anthoard' , 'CODE_POSTAL' => '82000' , 'VILLE' => 'MONTAUBAN' , 'DATE_EMBAUCHE' => '1987-10-06' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Lesaulnier', 'PRENOM' => 'Pascal' , 'ADRESSE' => '47 r Thiers' , 'CODE_POSTAL' => '57000' , 'VILLE' => 'METZ' , 'DATE_EMBAUCHE' => '1990-10-13' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Letessier', 'PRENOM' => 'Stéphane' , 'ADRESSE' => '5 chem Capuche' , 'CODE_POSTAL' => '27000' , 'VILLE' => 'EVREUX' , 'DATE_EMBAUCHE' => '1996-03-06' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Loirat', 'PRENOM' => 'Didier' , 'ADRESSE' => 'Les Pêchers cité Bourg la Croix' , 'CODE_POSTAL' => '45000' , 'VILLE' => 'ORLEANS' , 'DATE_EMBAUCHE' => '1992-08-30' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Maffezzoli', 'PRENOM' => 'Thibaud' , 'ADRESSE' => '5 r Chateaubriand' , 'CODE_POSTAL' => '2000' , 'VILLE' => 'LAON' , 'DATE_EMBAUCHE' => '1994-12-19' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Mancini', 'PRENOM' => 'Anne' , 'ADRESSE' => '5 r DAgier' , 'CODE_POSTAL' => '48000' , 'VILLE' => 'MENDE' , 'DATE_EMBAUCHE' => '1995-01-05' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Marcouiller', 'PRENOM' => 'Gérard' , 'ADRESSE' => '7 pl St Gilles' , 'CODE_POSTAL' => '91000' , 'VILLE' => 'ISSY LES MOULINEAUX' , 'DATE_EMBAUCHE' => '1992-12-24' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Michel', 'PRENOM' => 'Jean-Claude' , 'ADRESSE' => '5 r Gabriel Péri' , 'CODE_POSTAL' => '61000' , 'VILLE' => 'FLERS' , 'DATE_EMBAUCHE' => '1992-12-14' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Montecot', 'PRENOM' => 'Françoise' , 'ADRESSE' => '6 r Paul Valéry' , 'CODE_POSTAL' => '17000' , 'VILLE' => 'SAINTES' , 'DATE_EMBAUCHE' => '1998-07-27' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Notini', 'PRENOM' => 'Veronique' , 'ADRESSE' => '5 r Lieut Chabal' , 'CODE_POSTAL' => '60000' , 'VILLE' => 'BEAUVAIS' , 'DATE_EMBAUCHE' => '1994-12-12' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Onfroy', 'PRENOM' => 'Den' , 'ADRESSE' => '5 r Sidonie Jacolin' , 'CODE_POSTAL' => '37000' , 'VILLE' => 'TOURS' , 'DATE_EMBAUCHE' => '1977-10-03' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Pascreau', 'PRENOM' => 'Charles' , 'ADRESSE' => '57 bd Mar Foch' , 'CODE_POSTAL' => '64000' , 'VILLE' => 'PAU' , 'DATE_EMBAUCHE' => '1997-03-30' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Pernot', 'PRENOM' => 'Claude-Noël' , 'ADRESSE' => '6 r Alexandre 1 de Yougoslavie' , 'CODE_POSTAL' => '11000' , 'VILLE' => 'NARBONNE' , 'DATE_EMBAUCHE' => '1990-03-01' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Perrier', 'PRENOM' => 'Maître' , 'ADRESSE' => '6 r Aubert Dubayet' , 'CODE_POSTAL' => '71000' , 'VILLE' => 'CHALON SUR SAONE' , 'DATE_EMBAUCHE' => '1991-06-23' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Petit', 'PRENOM' => 'Jean-Louis' , 'ADRESSE' => '7 r Ernest Renan' , 'CODE_POSTAL' => '50000' , 'VILLE' => 'SAINT LO' , 'DATE_EMBAUCHE' => '1997-09-06' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Piquery', 'PRENOM' => 'Patrick' , 'ADRESSE' => '9 r Vaucelles' , 'CODE_POSTAL' => '14000' , 'VILLE' => 'CAEN' , 'DATE_EMBAUCHE' => '1984-07-29' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Quiquandon', 'PRENOM' => 'Joël' , 'ADRESSE' => '7 r Ernest Renan' , 'CODE_POSTAL' => '29000' , 'VILLE' => 'QUIMPER' , 'DATE_EMBAUCHE' => '1990-06-30' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Retailleau', 'PRENOM' => 'Josselin' , 'ADRESSE' => '88Bis r Saumuroise' , 'CODE_POSTAL' => '39000' , 'VILLE' => 'DOLE' , 'DATE_EMBAUCHE' => '1995-11-14' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Retailleau', 'PRENOM' => 'Pascal' , 'ADRESSE' => '32 bd Ayrault' , 'CODE_POSTAL' => '23000' , 'VILLE' => 'MONTLUCON' , 'DATE_EMBAUCHE' => '1992-09-25' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Souron', 'PRENOM' => 'Maryse' , 'ADRESSE' => '7B r Gay Lussac' , 'CODE_POSTAL' => '21000' , 'VILLE' => 'DIJON' , 'DATE_EMBAUCHE' => '1995-03-09' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Tiphagne', 'PRENOM' => 'Patrick' , 'ADRESSE' => '7B r Gay Lussac' , 'CODE_POSTAL' => '62000' , 'VILLE' => 'ARRAS' , 'DATE_EMBAUCHE' => '1997-08-29' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Tréhet', 'PRENOM' => 'Alain' , 'ADRESSE' => '7D chem Barral' , 'CODE_POSTAL' => '12000' , 'VILLE' => 'RODEZ' , 'DATE_EMBAUCHE' => '1994-11-29' , 'LAB_CODE' => '1' , 'password' => $mdp],
            ['name' => 'Tusseau', 'PRENOM' => 'Josselin' , 'ADRESSE' => '63 r Bon Repos' , 'CODE_POSTAL' => '28000' , 'VILLE' => 'CHARTRES' , 'DATE_EMBAUCHE' => '1991-03-29' , 'LAB_CODE' => '2' , 'password' => $mdp],
            ['name' => 'Swiss', 'PRENOM' => 'Théo' , 'ADRESSE' => '43 rue Saint Michel' , 'CODE_POSTAL' => '35600' , 'VILLE' => 'Redon' , 'DATE_EMBAUCHE' => '1991-06-18' , 'LAB_CODE' => '1' , 'password' => $mdp],

               
            ]);

        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
