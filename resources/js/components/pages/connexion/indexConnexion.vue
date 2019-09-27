<template>
    <div>
        <div id="formContent">
            <div id="container-login" class="row">
                <div id="bloc-left" class="col-sm-3"></div>
                <div id="form" class="card text-center col-sm-6 p-4">
                    <form>
                        <div class="col align-self-center form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" id="login" class="form-control" name="login" placeholder="login">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="password">
                                </div>
                            </div>
                            <input type="submit" class="form-control mt-3" value="Log In">
                        </div>
                    </form>
                    <div id="formFooter">
                        <a class="underlineHover" href="#">Forgot Password?</a>
                    </div>
                </div>
                <div id="bloc-right" class="col-sm-3"></div>
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