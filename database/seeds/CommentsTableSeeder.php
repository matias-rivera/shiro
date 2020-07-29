<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Comment::create([
            'user_id' => 1,
            'post_id' => 1,
            'content' => 'dica a la imprenta) desconocido usó una galería de textos y los mezcló de t
            al manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, si
            no que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencia
            lmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letras
            et", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoe
            dición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. ¿Por q
            ué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con 
            el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsu
            m es que tiene una distribución más o menos normal de las letras, al contrario de usar texto
            s como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español
             que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem I
             psum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resulta
             do muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas ve
             rsiones han evolucionado a través de los años, algunas veces por accidente, otras veces a pr
             opósito (por ejemplo insertándole humor y cosas por el estilo). ¿De dónde viene? Al contrario
              del pensamiento pop'
        ]);

        Comment::create([
            'user_id' => 1,
            'post_id' => 1,
            'content' => 'dica a la imprenta) desconocido usó una galería de textos y los mezcló de t
            al manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, si
            no que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencia
            lmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letras
            et", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoe
            dición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. ¿Por q
            ué lo usamos? Es un hecho establecidutoedición y editores de páginas web usan el Lorem I
             psum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resulta
             do muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas ve
             rsiones han evolucionado a través de los años, algunas veces por accidente, otras veces a pr
             opósito (por ejemplo insertándole humor y cosas por el estilo). ¿De dónde viene? Al contrario
              del pensamiento pop'
        ]);

        Comment::create([
            'user_id' => 1,
            'post_id' => 2,
            'content' => 'dica a la imprenta) desconocido usó una galería de textos y los mezcló de t
            al manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, si
            no que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencia
            lmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letras
            et", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoe
            dición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. ¿Por q
            ué lo usamos? Es un hecho establecidutoedición y editores de páginas web usan el Lorem I
             psum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resulta
             do muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas ve
             rsiones han evolucionado a través de los años, algunas veces por accidente, otras veces a pr
             opósito (por ejemplo insertándole humor y cosas por el estilo). ¿De dónde viene? Al contrario
              del pensamiento pop'
        ]);
        


    }
}
