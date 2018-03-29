     <?
    $team = array(
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/Solly_300px.jpg",
            "name"=>"Shlomo (Solly) Angel",
            "info"=>" es profesor de Planeación Urbana en el Instituto Marron de Gerencia Urbana y becario académico Senior de la Escuela de Stern de Negocios de la Universidad de Nueva York. El Profesor Angel es experto en políticas de vivienda y desarrollo urbano, ha asesorado organismos del sistema de Naciones Unidas, el Banco Mundial y el Banco Interamericano de Desarrollo (BID).
<br><br>
Actualmente se enfoca en la documentación y el estudio de la planeación de la expansión urbana en países de desarrollo. En 1973 inició el programa de Planeación de Asentamientos Humanos y Desarrollo en el Instituto Asiático del Tecnología en Bangkok. Allí enseñó entre 1973 y 1983, mientras realizaba una investigación sobre vivienda y desarrollo urbano en ciudades del este, sur y sureste asiático. 
<br><br>
Desde mediados de los 80s hasta mediados de los 90s, trabajó como consultor en vivienda y desarrollo urbano para ONU-Habitat, el Banco de Desarrollo Asiático y el Gobierno de Tailandia. En el año 2000 publicó “Housing Policy Matters” un estudio comparativo de políticas de vivienda alrededor del mundo. Ese mismo año, preparó reportes de políticas de vivienda para 11 países de Latinoamérica y el Caribe para el BID y el Banco Mundial. En 2010 publicó Planeta de ciudades. El Dr. Angel obtuvo su título de arquitectura y su doctorado en Planeación Urbana y Regional en la Universidad de California, Berkley."
            ),
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/Alex_300px.jpg",
            "name"=>"Alex Blei",
            "info"=>" es becario académico en el Programa de Expansión Urbana del Instituto Marron de Gerencia Urbana y la Escuela de Negocios Stern de la Universidad de Nueva York. Es candidato a PhD de la Universidad de Illinois del Departamento de Planeación Urbana y Políticas especializándose en transporte. Recientemente, formó parte del equipo que usó imágenes satelitales y mapas históricos en un periodo de 200 años. Sus hallazgos fueron publicados en el Atlas de Expansión Urbana. Como becario IGERT (Enseñanza Integradora de Posgrado en Educación y Practicas en Investigación, por sus siglas en ingles) está cambiando su enfoque del nivel macro a lo micro, a través del entendimiento de información geoespacial. También ha trabajado como planeador experto en transporte para las ciudades de Nueva York y Chicago."
            ),
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/Lamson_300px.jpg",
            "name"=>"Patrick Lamson-Hall",
            "info"=>" es becario académico en el Programa de Expansión Urbana del Instituto Marron de Gerencia Urbana y la Escuela de Negocios Stern de la Universidad de Nueva York. Recientemente obtuvo su título de Maestría en Planeación Urbana en la Escuela Robert F. Wagner de Servicio Público de la misma universidad. Su investigación se enfoca en urbanización en países en vías de desarrollo, desarrollo económico y urbanización histórica."
            ),
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/Galarza_300px.jpg",
            "name"=>"Nicolás Galarza Sanchez",
            "info"=>" es becario académico en el Programa de Expansión Urbana del Instituto Marron de Gerencia Urbana y la Escuela de Negocios Stern de la Universidad de Nueva York. Nicolás tiene una maestría en Planeación Urbana en la Escuela Robert F. Wagner de Servicio Público de la misma Universidad. 
<br><br>
Sirvió como asesor del director de la Estrategia de Superación de Pobreza Extrema y del Alto Consejero Presidencial para la Acción Social y la Cooperación Internacional en temas de Tecnología Cívica e Innovación. También fue pasante en el Parlamento Alemán en Berlín y asistente de investigación de las Facultades Ciencia Política y Relaciones Internacionales de la Universidad del Rosario en Bogotá. 
<br><br>
Actualmente coordina la implementación de diferentes iniciativas de crecimiento ordenado en Latinoamérica y realiza investigación sobre crecimiento urbano y sobre el estado del crecimiento de las ciudades en el mundo.
"
            ),
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/SumanKumar_300px.jpg",
            "name"=>"Suman Kumar",
            "info"=>" es el jefe de Análisis de Imágenes en el Observatorio de Expansión Urbana en India (UXO-INDIA), un centro desarrollado en alianza entre la Universidad de Nueva York y La Sociedad Educativa Mahatma en New Panvel, India. Tiene pregrado en Planeación Física de la Escuela de Planeación y Arquitectura de la New Delhi y maestría en Planeación Urbana del Instituto Tecnológico de India, Roorkee. Su investigación se enfoca en el uso de sensores remotos, SIG y técnicas de procesamiento de imágenes en el campo de la planeación urbana para estudios de suburbanización, crecimiento, usos de suelo, mapeo, disponibilidad de suelo e infraestructura básica."
            ),
        array(
            "img"=>"http://atlasofurbanexpansion.org/file-manager/userfiles/About/Sharad_Shingade_300px.jpg",
            "name"=>"Sharad Shingade",
            "info"=>" es jefe de Análisis de Imágenes en el Observatorio Indio de Expansión Urbana (UXO-INDIA), un centro de investigación iniciado en colaboración con el Proyecto de Urbanización de la Universidad de Nueva York (Escuela de Negocios Stern) y la Sociedad de Educación Mahatma (MES) de New Panvel, India.
<br><br>
Tiene una maestría en Geoinformática de la facultad de Ciencias de la  Geoinformación y Observación de la Tierra de la Universidad de Twente - ITC, Holanda. Recibió la beca Erasmus Mundus de la Unión Europea para cursar su maestría en Geoinformática en ITC. 
Los intereses de investigación de Sharad incluyen trabajo con sensores remotos satelitales, el procesamiento de imágenes, los Sistema de Información Geográfica (SIG), la modelación espacial, la geoestadística clásica y avanzada (estadística espacial), la cartografía de alta resolución basada en drones y modelación 3D."
            )
        );
    ?>
<div class='grid about wide'>
    <div class='col-1-1'>
        <div class='page-header'>Autores</div>
    </div>
</div>
<div class='grid about wide'>
    <? foreach($team as $t):?>
        <div class='col-1-4 tab-1-1 popit'>
            <img src="<?=$t['img']?>">
            <p class="about-text">
                <span class="highlight"><?=$t['name']?></span>
                <div class='popup'>
                    <div class='popdown'></div>
                    <div class='scrollOver'>
                        <img src="<?=$t['img']?>">
                        <?=$t['name']?><?=$t['info'];?>
                    </div>
                </div>
            </p>
        </div>
    <?endforeach;?>
</div>