<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="h1">Soy view {{name}}</h1>
			</div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'view-component',
  props:[name], 

  data () {
    return {
    	name:"Jonathan"

    }
  }
}
</script>

<style lang="css" scoped>
</style>