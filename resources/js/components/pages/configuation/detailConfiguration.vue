<template>
    <div class="card">
        <div class="card-body">
            <form submit.prevent>
                <div class="form-group">
                    <label>ID de la configuration</label>
                    <input type="number" class="form-control" v-model="id" disabled />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ConfigurationDetail',
    props: {
        id: String
    }
}
</script>