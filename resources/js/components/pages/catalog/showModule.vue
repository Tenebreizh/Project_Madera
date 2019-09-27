<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <div class="row card-body">
                        <div class="col-sm-10">
                            <div class="col form-group">
                                <label for="reference">Référence:</label>
                                <input type="text" class="form-control" id="reference" name="reference">
                            </div>
                            <div class="col form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
                            </div>
                            <div class="col form-group">
                                <label for="tva">TVA:</label>
                                <input type="text" class="form-control" id="tva" name="tva">
                            </div>
                            <div class="col form-group">
                                <label for="price">Prix:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="price">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="price">€</span>
                                    </div>
                                </div>
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