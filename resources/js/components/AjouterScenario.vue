<template>
    <div class="container">
        <!-- row -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nouveau Scenario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="ajouterScenario">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="nom">Nom du Scenario:</label>
                                                <input v-model="form.nom" type="text" class="form-control" id="nom" placeholder="Entrer le Nom du Scenario" :class="{ 'is-invalid': form.errors.has('nom') }">
                                                <has-error :form="form" field="nom"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div v-for="etapeSuivi in form.suivi">
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <label>Etape {{ etapeSuivi.id }}:</label>
                                                </div>
                                                <div class="col-3">
                                                    <label :for="'delai'+etapeSuivi.id" class="control-label">Délai</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <select class="form-control" @change="choisireEtape($event,etapeSuivi.id)">
                                                            <option v-for="etape in etapes" :title="etape.description" :value="etape.id" :selected="etapeSuivi.etape===etape.id? 'selected' :''">{{etape.libelle}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" min="0" v-model="etapeSuivi.delai" class="form-control" placeholder="délai en jours" :id="'delai'+etapeSuivi.id" required="required">
                                                </div>
                                                <div class="col-2" v-if="form.suivi.length+etapeSuivi.id>4">
                                                    <a class="remove" href="javascript:void(0)" @click="supprimerEtape(etapeSuivi.id)" :id="etapeSuivi.id" title="Supprimer cette Etape">
                                                        <i class="fas fa-trash fa-2x text-danger"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <a class="add" href="javascript:void(0)" @click="ajouterLigneEtape" title="Ajouter une Etape">
                                                    <i class="fa fa-plus-circle fa-2x text-success"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" @click="annulerCreation" class="btn btn-danger">Annuler</button>
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form:new Form({
                    nom:'',
                    suivi_string:'',
                    delais_string:'',
                    suivi:[
                        {'id':1, 'etape':1, 'delai':1},
                        {'id':2, 'etape':2, 'delai':1}
                    ],
                }),
                etapes:{}
            }
        },
        methods:{
            ajouterLigneEtape(){
                this.form.suivi.push({'id':this.form.suivi.length+1, 'etape':1, 'delai':''});
            },
            supprimerEtape(id){
                this.form.suivi.splice(id-1,1);
                var count=1;
                this.form.suivi.forEach(function(etapeSuivi) {
                    etapeSuivi.id=count;
                    count+=1;
                });
            },
            chargerEtapes(){
                axios.get("api/etape").then(({data}) => (this.etapes = data));
            },
            choisireEtape(event,numLigneEtape) {
                this.form.suivi[numLigneEtape-1].etape=this.etapes[event.target.value-1].id;
            },
            ajouterScenario(){
                var last_suivi_string=this.form.suivi_string;
                var last_delais_string=this.form.delais_string;
                for (var i = 0; i < this.form.suivi.length; i++) {
                    this.form.suivi_string+=(i!=0?':':'')+this.etapes[this.form.suivi[i].etape-1].id;
                    this.form.delais_string+=(i!=0?':':'')+this.form.suivi[i].delai;
                };
                this.form.post('api/scenario').then(() => {
                    toast.fire({
                        type: 'success',
                        title: 'scenario creer avec succès !!'
                    });
                    this.form.nom='';
                    this.form.suivi_string='';
                    this.form.delais_string='';
                    this.form.suivi=[
                        {'id':1, 'etape':1, 'delai':1},
                        {'id':2, 'etape':2, 'delai':1}
                        ];
                }).catch(() => {
                    this.form.suivi_string=last_suivi_string;
                    this.form.delais_string=last_delais_string;
                    toast.fire({
                        type: 'error',
                        title: 'verifier les donnees que vous avez saisit !!!'
                    });
                })
            },
            annulerCreation(){
                swal.fire({
                    title: 'Voulez-vous annuler la création ?',
                    type: 'question',
                    confirmButtonText:  'Oui',
                    cancelButtonText:  'Non',
                    showCancelButton: true
                }).then((result)=>{
                    if (result.value){
                        this.form.suivi=[
                            {'id':1, 'etape':1, 'delai':1},
                            {'id':2, 'etape':2, 'delai':1}
                        ];
                    }
                })
            }
        },
        created() {
            this.chargerEtapes();
        }
    }
</script>
