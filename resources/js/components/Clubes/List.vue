<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column mb-5">
            <div class="form-box-head d-flex d-row justify-content-between">
                <h2>Clubes</h2>
                <a href="/clubes/create"><button type="button" class="btn btn-success">Cadastrar</button></a>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Relações</th>
                        <th scope="col">País</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle" v-for="clube, key in this.clubesList" :key="clube.id">
                        <td class="text-center" scope="row">
                            <img :src="clube.icon" :alt="clube.name" class="clube_icon">
                        </td>
                        <td>
                            <span>{{ clube.name }}</span>
                        </td>
                        <td>
                            <span>{{ clube.count }} usuários</span>
                        </td>
                        <td>
                            <img :src="clube.countryFlag" :alt="clube.country" class="clube_coutryFlag">
                            &nbsp;&nbsp;
                            <span>{{ clube.country }}</span>
                        </td>
                        <td class="text-center">
                            <a :href="`/clubes/edit/${clube.id}`">
                                <button type="button" class="btn btn-outline-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </a>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-outline-danger" @click="deleteClube(key, clube)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        props: ['clubes'],
        data() {
            return {
                clubesList: this.clubes
            }
        },
        methods: {
            async deleteClube(key, clube) {
                if(confirm("Você realmente deseja deletar o clube "+clube.name+"?\nIsso irá apagar todas as relações dele!!! Total: "+clube.count)){
                    await axios.delete("http://127.0.0.1:8000/clubes/"+clube.id)
                    .then(
                        this.clubesList.splice(key, 1)
                    );
                }
            }
        }
    }
</script>
