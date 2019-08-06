<template>
    <div class="container">
        <!-- row -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nouveau Document</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form @submit.prevent="ajouterDocument">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="num_ordre">Numero d'Ordre</label>
                                <input v-model="form.num_ordre" type="number" class="form-control" id="num_ordre" placeholder="Enter le Numero d'Ordre" :class="{ 'is-invalid': form.errors.has('num_ordre') }">
                                <has-error :form="form" field="num_ordre"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="date">Date du Document</label>
                                <input v-model="form.date" type="date" class="form-control" id="date" placeholder="Entrer la Date du Document" :class="{ 'is-invalid': form.errors.has('date') }">
                                <has-error :form="form" field="date"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="chef_responsable">Nom du Chef Resposable</label>
                                <input v-model="form.chef_responsable" type="text" class="form-control" id="chef_responsable" placeholder="Entrer le Nom du Chef Resposable" :class="{ 'is-invalid': form.errors.has('chef_responsable') }">
                                <has-error :form="form" field="chef_responsable"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="agence">Agence</label>
                                <select v-model="form.agence" class="form-control" id="agence" placeholder="Selectionner une Agence" :class="{ 'is-invalid': form.errors.has('agence') }">
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
                                <select v-model="form.ville" class="form-control" id="ville" placeholder="Selectionner une Ville" :class="{ 'is-invalid': form.errors.has('ville') }">
                                    <has-error :form="form" field="ville"></has-error>
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
                                <label for="objet">Objet du Document</label>
                                <input v-model="form.objet" type="text" class="form-control" id="objet" placeholder="Objet du Document" :class="{ 'is-invalid': form.errors.has('objet') }">
                                <has-error :form="form" field="objet"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="type">Type du Document</label>
                                <select v-model="form.type" class="form-control" id="type" placeholder="Selectionner le type du Document" :class="{ 'is-invalid': form.errors.has('type') }">
                                    <has-error :form="form" field="type"></has-error>
                                    <option>Facture</option>
                                    <option>type_1</option>
                                    <option>type_2</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
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
                    num_ordre: '',
                    date: '',
                    chef_responsable: '',
                    agence: '',
                    ville: '',
                    objet: '',
                    type: ''
                })
            }
        },
        methods:{
            ajouterDocument(){
                this.form.post('api/document').then(() => {
                    toast.fire({
                        type: 'success',
                        title: 'document creer avec succès !!'
                    })
                }).then(()=>{
                    this.form.num_ordre='';
                    this.form.date='';
                    this.form.chef_responsable='';
                    this.form.agence='';
                    this.form.ville='';
                    this.form.objet= '';
                    this.form.type='';
                });


            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
