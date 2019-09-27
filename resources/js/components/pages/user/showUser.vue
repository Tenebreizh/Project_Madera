<template>
    <div class="row py-4">  
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card">
                <div class="row card-body">
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            <div class="row mt-5">
                                <div class="col-sm-4 form-group">
                                    <label for="firstname">Nom:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="lastname">Prénom:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"  placeholder="exemple@email.fr">
                                </div> 
                                <div class="col-lg-6 form-group">
                                    <label for='pwd'>Mot de passe</label>
                                    <input type="password" class="form-control" id="epwdmail" name="pwd">
                                </div>
                            </div>             
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label for="email">Rôle:</label>
                                    <select name="city" class="form-control"></select>
                                </div> 
                            </div>             
                        </div>
                    </div>
                    
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-primary btn-lg">Valder</button>
                    </div>
                </div>
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