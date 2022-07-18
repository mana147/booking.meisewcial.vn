
<!-- ***************************** Template **************************-->
<template>
	<div id="appVue">
		<HeaderApp />
		<BodyApp />
	</div>
</template>

<!-- ***************************** Script *************************** -->
<script>
import HeaderApp from './components/HeaderApp';
import BodyApp from './components/BodyApp.vue';

export default {
    name: "App",
	components :{ HeaderApp , BodyApp },
}
</script>


<!-- ****************************** Style **************************** -->
<style>
#app {
	font-family:verdana;
}
</style>
<!-- *************************************************************** -->