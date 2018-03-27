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
                                        <div class="input-field col s12">
                                            <input placeholder=" nom du payant" id="nomdivers" type="text">
                                            <label for="nomdivers">Nom</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input placeholder=" motif du versement" id="motifvers" type="text">
                                            <label for="motifvers">Motif du versement</label>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input placeholder="type de versement" id="typeversement" type="text">
                                                <label for="typeversement">Type versement</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="Montant" id="montantdivers" type="number">
                                            <label for="postnom">Montant</label>
                                        </div>
                                    </div>




                                    <div class="row">

                                        <button  id="btn_enr_divers" class="btn" >Enregistrer
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