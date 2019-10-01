<template>
    <div class="card">
        <div class="card-body">
            <form>
                <div id="Entete-module">
                    <h2 class="text-center ml-5 mb-5 mr-5">Composant</h2>
                    <div class="row">
                        <div class="col form-group">
                            <label for="reference">Référence</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class="col form-group">
                            <label for="reference">Coupe de principe</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class="col form-group">
                            <label for="reference">Coupe CCTP</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col card m-2">
                        <h4>Détail des sections</h4>
                        <div class=" form-group">
                            <label for="reference">Nombre de lisses</label>
                            <input type="number" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Nombre de contreforts</label>
                            <input type="number" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Sabots d'assemblage</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Goujons de fixation</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Support de sol</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                    </div>
                    <div class="col card m-2">
                        <h4>Détail des montants</h4>
                        <div class=" form-group">
                            <label for="reference">Départ</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Arrivée</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Intermédiaire</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col card m-2">
                        <h4>Remplisage par unité entre deux montant</h4>
                        <div class="form-group">
                            <label for="reference">Remplissage</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class="form-group">
                            <label for="reference">Visserie</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class="form-group">
                            <label for="reference">Panneaux</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                    </div>
                    <div class="col card m-2">
                        <div class=" form-group">
                            <label class="mt-4" for="reference">Pourcentage de marge sur le prix de base</label>
                            <input type="text" class="form-control" id="reference" name="reference">
                        </div>
                        <div class=" form-group">
                            <label for="reference">Temps de main d'oeuvre atelier</label>
                            <div class="input-group">
                                <input type="time" class="form-control">
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="reference">Temps de main d'oeuvre pose</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class=" text-right">
                    <button type="button" class="btn btn-success">Modification</button>
                    <button type="button" class="btn btn-primary">Valder</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

</script>