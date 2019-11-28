@extends('principal')
@section('contenido')
<!-- Contenido Principal -->
    <template v-if="menu==0">
        <h1>contenido del menu 0</h1>
    </template>
    <template v-if="menu==1">
        <Nacimiento></Nacimiento>
    </template>
    <template v-if="menu==2">
        <Matrimonio></Matrimonio>
    </template>
    <template v-if="menu==3">
        <h1>contenido del menu 3</h1>
    </template>
    <template v-if="menu==4">
        <h1>contenido del menu 4</h1>
    </template>
    <template v-if="menu==5">
        <h1>contenido del menu 5</h1>
    </template>
    <template v-if="menu==6">
        <h1>contenido del menu 6</h1>
    </template>
<!-- /Fin del contenido principal -->
@endsection
