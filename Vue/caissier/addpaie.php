<?php include_once 'menuleft.php';?>

    <div class="container">
        <div class="section">


            <div id="work-collections" class="seaction">

                <div class="row">
                    <div class="col s12 m12 l6 offset-l3 center-align center center-block">
                        <div class="card-panel">
                            <h4 class="header2 center-align center center-block">Remplir les informations</h4>
                            <div class="row">
                                <div class="col  s12 center-align center center-block">
                                    <div class="row">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="matricule de l'eleve" id="matricule" type="text">
                                                <label for="matricule">Matricule</label>
                                            </div>
                                        </div>
                                        <div class="input-field col s12">
                                            <input placeholder=" nom de l'eleve" id="nom" type="text">
                                            <label for="nom">Nom</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="postnom de l'eleve" id="postnom" type="text">
                                            <label for="postnom">Post-nom</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">

                                            <select id="data" class="browser-default center-align">
                                                <option>motif</option>
                                            </select>

                                        </div>
                                        <input type="text" id="status" class="hidden hide">
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="montant" id="montant" type="number">
                                            <label for="montant">Montant</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="annee" id="annee" type="number">
                                            <label for="annee">Annee</label>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="observation" id="observationajout" type="text">
                                            <label for="observationajout">Obervation</label>
                                        </div>
                                    </div>

                                    <div class="row">

                                                <button  id="btn_enr_paie" class="btn" >Enregistrer
                                                </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END WRAPPER -->

    </div>
<?php include_once 'footer.php';?>