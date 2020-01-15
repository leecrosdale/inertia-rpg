<template>

<layout>


    <div>

        <h1>Your Stats</h1>
        <div class="row">
            <div class="col-md-6">
            <div class="col-md-6">
                Name: {{ player.username }}
            </div>
            <div class="col-md-6">
                Level: {{ player.level }}
            </div>
            <div class="col-md-6">
                Exp: {{ player.experience }}
            </div>
            <div class="col-md-6">
                Health: {{ player.health }} / {{ player.max_health }}
            </div>
            <div class="col-md-6">
                Attack: {{ player.attack }}
            </div>
            <div class="col-md-6">
                Defence: {{ player.defence }}
            </div>

            </div>
        </div>

        <div class="row">

        <div class="col-md-12 table table-responsive">

    <table class="table table-striped">
        <tr>
            <th>Player Name</th>
            <th>Level</th>
            <th>Kills</th>
            <th>Deaths</th>
        </tr>
        <tr v-for="player in players">
            <td>{{ player.username }}</td>
            <td>{{ player.level }}</td>
            <td>{{ player.kills }}</td>
            <td>{{ player.deaths }}</td>
            <td><inertia-link :href="$route('player.attack', player)">Attack!!</inertia-link></td>
        </tr>
    </table>

        </div>

        </div>

    </div>


</layout>




</template>

<script>
    import Layout from "../../Shared/Layout";
    export default {
        name: "Turn",
        components: {Layout},
        props: ['player','players']


    }
</script>

<style scoped>

</style>
