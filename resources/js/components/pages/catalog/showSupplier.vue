<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <form>
                    <h2 class="m-2 text-center">Fournisseur</h2>
                    <div class="row card-body">
                        <div class="col-sm-10">
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="numero">N°:</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                                <div class="col form-group">
                                    <label for="street">Adresse:</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col form-group">
                                    <label for="cp">CP:</label>
                                    <input type="text" class="form-control" id="cp" name="cp" pattern="[0-9]{5}" placeholder="00000">
                                </div>
                                <div class="col form-group">
                                    <label for="city">Ville:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col form-group">
                                    <label for="country">Pays:</label>
                                    <input type="text" class="form-control" id="country" name="country">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <label for="phone">Téléphone:</label>
                                    <input type="number" class="form-control" id="phone" name="phone"  placeholder="00 00 00 00 00">
                                </div>
                                <div class="col form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="number" class="form-control" id="fax" name="fax"  placeholder="00 00 00 00 00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr">
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