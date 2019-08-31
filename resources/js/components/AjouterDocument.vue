<template>
    <div class="container">
        <!-- row -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nouveau Document</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="ajouterDocument">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agence">Agence</label>
                                        <select v-model="form.agence" class="form-control" id="agence" :class="{ 'is-invalid': form.errors.has('agence') }">
                                            <has-error :form="form" field="agence"></has-error>
                                            <option>Berkane</option>
                                            <option>Driouch</option>
                                            <option>Figuig</option>
                                            <option>Guercif</option>
                                            <option>Jerada</option>
                                            <option>Nador</option>
                                            <option>Oujda</option>
                                            <option>Taourirt</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ville">Ville</label>
                                        <input v-model="form.ville" type="text" class="form-control" id="ville" placeholder="Entrer la ville" :class="{ 'is-invalid': form.errors.has('ville') }">
                                        <has-error :form="form" field="ville"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date du Document</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input v-model="form.date" type="date" class="form-control" id="date" :class="{ 'is-invalid': form.errors.has('date') }">
                                            <has-error :form="form" field="date"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="chef_responsable">Responsable</label>
                                        <input v-model="form.chef_responsable" type="text" class="form-control" id="chef_responsable" placeholder="Entrer le Nom du Chef Resposable" :class="{ 'is-invalid': form.errors.has('chef_responsable') }">
                                        <has-error :form="form" field="chef_responsable"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="fournisseur">Fournisseur</label>
                                        <input v-model="form.fournisseur" type="text" class="form-control" id="fournisseur" placeholder="Entrer le Nom du Fournisseur">
                                    </div>
                                    <div class="form-group" v-if="form.scenario">
                                        <div class="alert bg-warning disabled color-palette">
                                            <i class="icon fas fa-exclamation-triangle fa-2x"></i><br>
                                            Vous choisissez le Scenario {{this.scenarios[this.form.scenario].nom}} !<br>
                                            Ce Document doit passer du <span v-for="(etape,index) in scenarios[form.scenario].suivi" :title="etape.description">{{etape.libelle}}<span v-if="index<scenarios[form.scenario].suivi.length-1">-></span></span>.<br>
                                            Il faut passer ce Document au <span :title="scenarios[form.scenario].suivi[1].description">{{this.scenarios[form.scenario].suivi[1].libelle}}</span> dans <span>{{this.scenarios[form.scenario].delais[0]}}</span> Jours.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="num_ordre">Numero d'Ordre</label>
                                        <div class="input-group">
                                            <input v-model="form.annee" type="text" class="col-3 ml-1 mr-1" placeholder="Annee"><strong class="mt-2">/</strong>
                                            <input v-model="form.numero" type="text" class="col-3 ml-1 " placeholder="Numero">
                                            <input v-model="form.num_ordre" type="hidden" class="form-control" id="num_ordre" placeholder="Enter le Numero d'Ordre" :class="{ 'is-invalid': form.errors.has('num_ordre') }"  >
                                            <has-error :form="form" field="num_ordre"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="objet">Objet du Document</label>
                                        <input v-model="form.objet" type="text" class="form-control" id="objet" placeholder="Objet du Document" :class="{ 'is-invalid': form.errors.has('objet') }">
                                        <has-error :form="form" field="objet"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type du Document</label>
                                        <select v-model="form.type" class="form-control" id="type" :class="{ 'is-invalid': form.errors.has('type') }">
                                            <has-error :form="form" field="type"></has-error>
                                            <option>Generale</option>
                                            <option>Facture</option>
                                            <option>type_1</option>
                                            <option>type_2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="scenario">Appliquer</label>
                                        <select v-model="form.scenario" class="form-control" id="scenario" :class="{ 'is-invalid': form.errors.has('scenario') }">
                                            <has-error :form="form" field="scenario"></has-error>
                                            <option v-for="(scenario,index) in scenarios" :value="index+''">{{scenario.nom}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea v-model="form.note" rows="4" cols="50" maxlength="191" class="form-control" id="note" placeholder="Remarques" :class="{ 'is-invalid': form.errors.has('note') }"></textarea>
                                        <has-error :form="form" field="note"></has-error>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" @click="annulerCreation" class="btn btn-danger">Annuler</button>
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- ./row -->
    </div>
</template>

<script>
    export default {
        data () {
            return {
                form: new Form({
                    agence: '',
                    ville: '',
                    date: new Date(),
                    chef_responsable: '',
                    fournisseur:'',
                    annee:new Date().getFullYear(),
                    numero:'',
                    num_ordre:'',
                    objet: '',
                    type: '',
                    scenario:'',
                    note:'',
                    id_etape:'',
                    id_scenario:''
                }),
                scenarios:{},
                etapes:{},
                id_document:''
            }
        },
        methods:{
            ajouterDocument(){
                this.form.num_ordre=this.form.annee+'_'+this.form.numero;
                this.form.id_scenario=this.scenarios[this.form.scenario].id;
                this.form.id_etape=this.scenarios[this.form.id_scenario].suivi[0].id;
                axios.post('api/document', this.form).then((response) => {
                    this.id_document=response.data.id;
                    this.form.agence='';
                    this.form.ville='';
                    this.form.date='';
                    this.form.chef_responsable='';
                    this.form.fournisseur='';
                    this.form.numero= '';
                    this.form.objet='';
                    this.form.type='';
                    this.form.scenario='';
                    this.form.note='';
                    axios.post('api/suivi',{
                        'id_document' : this.id_document,
                        'id_scenario' : this.form.id_scenario,
                        'id_etape' : this.form.id_etape,
                        'date': new Date().toISOString().slice(0,10)+' '+new Date().toISOString().slice(11,19),
                    }).then(()=>{
                            toast.fire({
                                type: 'success',
                                title: 'document creer avec succès !!'
                            });
                        }
                    ).catch(()=>{
                        toast.fire({
                            type: 'error',
                            title: 'erreur dans la saisit du suivi !!!'
                        })
                    });
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'verifier les donnees que vous avez saisit !!!'
                    })
                });
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
                        this.form.agence='';
                        this.form.ville='';
                        this.form.date='';
                        this.form.chef_responsable='';
                        this.form.fournisseur='';
                        this.form.numero= '';
                        this.form.objet='';
                        this.form.type='';
                        this.form.scenario='';
                        this.form.note='';
                    }
                })
            },
            chargerScenarios(){
                axios.get("api/scenario").then(({data}) => {
                    this.scenarios = data;
                    for (var i = 0; i < this.scenarios.length; i++) {
                        let id_etapes=this.scenarios[i].suivi.split(':');
                        this.scenarios[i].suivi=[];
                        for (var j = 0; j < id_etapes.length; j++) {
                            this.scenarios[i].suivi.push(this.etapes.find(etape => etape.id === parseInt(id_etapes[j])));
                        }
                        this.scenarios[i].delais=this.scenarios[i].delais.split(':');
                    }
                });
            },
            chargerEtapes(){
                axios.get("api/etape").then(({data}) => (this.etapes = data));
            },
        },
        created() {
            this.chargerEtapes();
            this.chargerScenarios();
        }
    }
</script>
