<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <div class="row card-body">
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="reference">Référence:</label>
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>
                                    <div class="col form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" class="form-control" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="external_finition">Finition extérieur:</label>
                                        <select name="external_finition" class="form-control"></select>
                                    </div>
                                    <div class="col form-group">
                                        <label for="isolation">Type d'isolation:</label>
                                        <select name="isolation" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="covering">Type de couverture:</label>
                                        <select name="covering" class="form-control"></select>
                                    </div>
                                    <div class="col form-group">
                                        <label for="window_frame">Qualité huisserie:</label>
                                        <select name="window_frame" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label for="regle">Règle:</label>
                                    <input type="text" class="form-control" id="regle" name="regle">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-primary btn-lg">Valder</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>