<template>
    <div class="row py-4">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card ">
                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                            <div class="row">
                                <div class="col-lg-12 text-left mb-4">
                                    <h2><center>Création d'un devis</center></h2>
                                </div>
                            </div>
                                <div id="container-haut" class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 pt-2 pl-2">
                                            <h3 class="text-center">Informations générales</h3>
                                                <div id="container-entete-left" class="">
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Nom du projet:</label>
                                                        <input type="text" class="form-control" disabled="disabled" v-model="project.name">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Gamme:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(range, key) in ranges" :value="range.id" :key="key"> {{ range.reference }} </option>
                                                        </select>             
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Référence du projet:</label>
                                                        <input type="text" class="form-control" disabled="disabled" v-model="project.reference">            
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Type d'isolation:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(insulator, key) in insulators" :value="insulator.id" :key="key"> {{ insulator.reference }} </option>
                                                        </select>            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col form-group">
                                                        <label for="roles">Référence du client:</label>
                                                        <input type="text" class="form-control" disabled="disabled" v-model="client.firstname">
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="roles">Finitions extérieur:</label>
                                                        <select name="role" class="form-control">
                                                            <option v-for="(external_finition, key) in external_finitions" :value="external_finition.id" :key="key"> {{ external_finition.reference }} </option>
                                                        </select>            
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-6 form-group">
                                                        <label for="roles">Date de création:</label>
                                                        <input type="text" disabled="disabled" class="form-control" v-model="quotation.created_at">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 pt-2 pl-2">
                                            <h3 class="text-center">Plan</h3>
                                            <div id="container-entete-right" class=" text-center"> 
                                                <button class="btn btn-success" data-toggle="modal" data-target="#AddPlan">Ajouter un plan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                

                                
                                </div>
                            <hr>
                            <div id="details" class="row">
                                
                                <div id="container-detail" class="col-lg-12 mt-2 ml-2">
                                    <div class="row">
                                        <h3 class="col-lg-1 float-left">Détails</h3>
                                        <button class="offset-10 btn btn-primary" data-toggle="modal" data-target="#AddQuotationLine">Ajouter</button>
                                    </div>
                                    <br>        
                                    <div class="col-lg-12">
                                        <DataTable :data="quotationLines" :columns="columnsCustomer" :actions="actions" :index="false" :loading="loadingData"></DataTable>
                                    </div>
                                </div>
                            </div>

                            <div id="footer" class="row">
                                <div id="footer-detail" class="col-lg-12 mt-2 ml-2">
                                    <hr>                                     
                                    <h3>Pied</h3>         
                                    <div class="col-lg-6 pull-left">
                                        <form>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label">Montant H.T.</label>
                                                <div class="col-sm-10">
                                                    <input type="" class="form-control" disabled="disabled" id="inputMontantHT" v-model="montantHt">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Montant taxes.</label>
                                                        <div class="col-sm-10">
                                                    <input type="" class="form-control" disabled="disabled" id="inputMontantHT" v-model="montantTaxe">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Montant T.T.C.</label>
                                                        <div class="col-sm-10">
                                                    <input type="" class="form-control" disabled="disabled" id="inputMontantHT" v-model="montantTTC">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Valider</button>
                        </div>

                        </div>  
                    </div>
                </div>
            </div>
        

    <!-- Modal ajout modules spé -->
    <div class="modal fade bd-example-modal-lg" id="AddQuotationLine" tabindex="-1" role="dialog" aria-labelledby="AddQuotationLineLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="!edit" class="modal-title" id="AddCustomerLabel">Crétion d'une ligne détail</h5>
                    <h5 v-else class="modal-title" id="AddCustomerLabel">Modification d'une ligne détail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class='row'>
                            <div class="col form-group">
                                <label for="roles">Module:</label>
                                <select name="role" class="form-control" v-model="customModule.module_id" @change="initCustomModule()" >
                                    <option v-for="(UnModule, key) in modules" :value="UnModule.id" :key="key"> {{ UnModule.name }} </option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="roles">Description:</label>
                                <input type="text" class="form-control" disabled="disabled" v-model="customModule.description">
                            </div>
                            <div class="col form-group">
                                <label for="roles">Référence:</label>
                                <input type="text" class="form-control" disabled="disabled" v-model="customModule.label">
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class="col form-group">
                                <label for="roles">Taxe:</label>
                                <select name="role" class="form-control" v-model="quotationLine.taxe_id">
                                    <option v-for="(taxe, key) in taxes" :value="taxe.id" :key="key"> {{ taxe.name }} </option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="roles">Prix:</label>
                                <input type="text" class="form-control" v-model="customModule.price">
                            </div>
                            <div class="col form-group">
                                <label for="roles">Quantité:</label>
                                <input type="number" class="form-control" v-model="quotationLine.quantity">
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col form-group">
                                <div class="form-group">
                                    <label for="lenghtSection" class="form-label ">Longueur de la section</label>
                                    <input type="number" id="lenghtSection" class="form-control">
                                </div>
                            </div>
                            <div class="col form-group">
                                <div class="form-group">
                                    <label for="angle" class="form-label ">Angle</label>
                                    <input type="number" id="angle" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col form-group">
                                <label for="Specification">Spécifications</label>
                                <textarea class="form-control" id="Specification" v-model="customModule.specification" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button v-if="!edit" type="button" class="btn btn-primary" @click="createModuleCustom()">Valider</button>
                    <button v-else type="button" class="btn btn-success" @click="updateDetailLine()">Modifier</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add plan -->
    <div class="modal fade" id="AddPlan" tabindex="-1" role="dialog" aria-labelledby="AddPlanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Plan du Bureau d'études</p>
                </div>
                <div class="modal-body">
                    <form>
                        <div class='row'>
                            <div class="col form-group">
                                <input type="text" placeholder="Fichier" class="form-control" id="fileName" name="fileName">
                            </div>
                            <div class="col form-group">
                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">            
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
        </div>
    </div>


    </div>
</template>

<script>
import moment from "moment";

export default {
    data() {
        return {
            loadingData: false,
            edit:false,
            columnsCustomer: [
                {name: "id", th: "N°"},
                {name: "name", th: "Nom"},
                {name: "description", th: "Description"},
                {name: "quantity", th: "Quantité"},
                {name: "price", th: "Prix"},
                
            ],
            comments: [],
            external_finitions:[],
            external_finition:{
                label:'',
                description:'',
                reference:''
            },
            insulators:[],
            insulator:{
                label:'',
                description:'',
                reference:''
            },
            ranges:[],
            range:{
                covering_id:'',
                insulator_id:'',
                external_finition_id:'',
                window_frame_id:'',
                label:'',
                description:'',
                reference:'',
                rule:'',
            },
            taxes:[],
            taxe:{
                name:'',
                description:'',
                rate:0,
            },
            // Devis
            quotation:{
                project_id:'',
                active:'',
            },
            project:{
                client_id:'',
                user_id:'',
                state_id:'',
                name:'',
                description:'',
                reference:'',
            },
            // Partie ligne de devis -----------------------
            quotationLines:[],
            quotationLine:{
                custom_module_id:'',
                quotation_id:'',
                taxe_id:'',
                name:'',
                description:'',
                price:0,
                quantity:'',
                created_at:'',
            },
            customModules:[],
            customModule:{
                module_id:'',
                label:'',
                description:'',
                specification:'',
                price:0,
                commercial_marge:''
            },
            modules:[],
            UnModule:{
                range_id:'',
                name:'',
                description:'',
                principal_cut:'',
                cctp:'',
                marge:'',
                labor_timev:'',
                price:'',
                marge_enterprise:''
            },
            client:{
                city_id:'',
                firstname:'',
                lastname:'',
                street:'',
                street_number:'',
                zipcode:'',
                email:'',
                phone:''
            },
            // ---------------------------------------------
            //---------- Montant pied de page --------------
            montantHt:0,
            montantTaxe:0,
            montantTTC:0,
            // ---------------------------------------------
            actions: [
                {text: "", icon: "fas fa-eye", color: "primary btn-pill mr-2", action: (row, index) => {
                    this.quotationLine = this.quotationLines[index];
                    this.getCustomModule(this.quotationLine.custom_module_id)
                    $("#AddQuotationLine").modal("show");
                }},
                {text: "", icon: "fas fa-edit", color: "success btn-pill mr-2", action: (row, index) => {
                    this.edit = true;
                    this.quotationLine = this.quotationLines[index];
                    this.getCustomModule(this.quotationLine.custom_module_id)
                    $("#AddQuotationLine").modal("show");
                }},
                {text: "", icon: "fas fa-trash-alt", color: "danger btn-pill mr-2", action: (row, index) => {
                    if(confirm("Voulez vous suprimer le ligne détail ?")){
                        this.deleteDetailLine(row.id)
                    }
                }},
            ]
        }
    },

    methods: {
        

        //----- Récupération du devis ----------------
        getClient(id){
            axios.get('/api/client/'+id)
            .then(response =>{
                this.client = response.data
            })
        },

        getProject(id){
            axios.get("/api/project/"+id)
            .then(response => {
                this.project = response.data
                this.getClient(this.project.client_id)
            })
        },

        getQuotation(){
            let id = this.$route.params.id
            axios.get('api/quotation/'+id)
            .then(response => {
                this.quotation = response.data
                this.getProject(this.quotation.project_id)
            })
        },
        //-------------------------------------------- 

        // Select ------------------------------------
        getinsulators(){
            axios.get("/api/insulators")
            .then(response => {
                this.insulators = response.data
            })
        },
        getFinitions(){
            axios.get("/api/externalFinitions")
            .then(response => {
                this.external_finitions = response.data
            })
        },
        getGammes(){
            this.loadingData = true
            axios.get("/api/ranges")
            .then(response => {
                this.ranges = response.data
                this.loadingData = false
            })
        },
        getModules(){
            axios.get("/api/modules")
            .then(response => {
                this.modules = response.data
            })
        },
        getTaxes(){
            axios.get('/api/taxes')
            .then(response => {
                this.taxes = response.data
            })
        },
        // --------- MONTANT ------------------------

        additionDesMontant(){
            let rate = 0
            let montantLigne = 0

            this.montantHt = 0
            this.montantTaxe = 0
            this.montantTTC = 0

            this.quotationLines.forEach(element => {
                //Montant Ht
                this.montantHt = this.montantHt + (element.quantity * parseFloat(element.price))
                
                montantLigne = element.quantity * parseFloat(element.price)
                //Calcul des taxe
                axios.get('/api/taxe/'+ element.taxe_id)
                .then(response => {
                    this.taxe = response.data
                    this.montantTaxe = this.montantTaxe + (montantLigne * parseFloat(response.data.rate))
                    
                    this.montantTTC = this.montantHt + this.montantTaxe 
                })
            }) 

        },

        // ------------------------------------------
        getQuotationLines(){
            let id = this.$route.params.id
            this.loadingData = true
            axios.get('/api/quotation/'+ id +'/quotationLines')
            .then(response => {
                this.quotationLines = response.data
                this.loadingData = false
                this.additionDesMontant()
            })
        },

        getQuotationLine(id){
            axios.get('/api/quotationLine/'+id)
            .then(response => {
                this.quotationLine = response.data
            })
        },

        getCustomModule(id){
            axios.get('/api/customModule/'+id)
            .then(response => {
                this.customModule = response.data
            })
        },

        createQuotationLine(quotationLine){
            axios.post('/api/quotationLine', quotationLine)
            .then(response => {
                this.quotationLines.push(response.data)
                $("#AddQuotationLine").modal("hide");
                this.additionDesMontant()
            })
        },

        createModuleCustom(){
            let that = this
            this.customModule.commercial_marge = this.UnModule.marge_enterprise
            axios.post('/api/customModule', this.customModule)
            .then(function(response) {
                that.quotationLine.custom_module_id = response.data.id
                that.quotationLine.quotation_id     = that.quotation.id
                that.quotationLine.name             = response.data.label
                that.quotationLine.description      = response.data.description
                that.quotationLine.price            = response.data.price
                that.createQuotationLine(that.quotationLine)
            })
        },

        initCustomModule(){ 
            axios.get("/api/module/"+this.customModule.module_id)
            .then(response => {
                this.UnModule = response.data
                this.customModule.price = this.UnModule.price
                this.customModule.description = this.UnModule.description
                this.customModule.label = this.UnModule.name
            })
            
        },

        UpdateQuotationLine(){
            this.quotationLine.price = this.customModule.price
            axios.put('/api/quotationLine/'+this.quotationLine.id,this.quotationLine)
            .then(response => {
                $("#AddQuotationLine").modal("hide")
                this.edit = false
                this.getQuotationLine(response.data.id)
            })
        },

        updateCustomModule(){
            axios.put('/api/customModule/'+this.customModule.id,this.customModule)
            .then(response => {
                this.getCustomModule(response.data.id)
            })
        },

        updateDetailLine(){
            this.updateCustomModule(),
            this.UpdateQuotationLine(),
            this.getQuotationLines()
        },

        deleteQuotationLine(id){
            axios.delete('/api/quotationLine/'+id)
            .then(response => {
                this.getQuotationLines()
                
            })
        },

        deleteCustomModule(id){
            axios.delete('/api/customModule/'+id)
            .then(response => {
            })
        },

        deleteDetailLine(id){
            this.deleteCustomModule(id),
            this.deleteQuotationLine(id)
        },

        // --------------------------------------------
        // Fonction principal -------------------------
        getAllValue(){
            this.getinsulators(),
            this.getFinitions(),
            this.getGammes(),
            this.getModules(),
            this.getTaxes()
        }
    },

    mounted() {
        this.getQuotation(),
        this.getQuotationLines(),
        this.getAllValue()
    },
}
</script>

<style>

</style>