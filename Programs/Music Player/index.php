<?php
// Diretório onde estão as músicas
$musicDirectory = 'music/';

// Obtém todos os arquivos do diretório de música
$musics = glob($musicDirectory . '*.{mp3,wav}', GLOB_BRACE);

// Verifica se existem músicas para listar
if (empty($musics)) {
    echo 'Nenhuma música encontrada.';
} else {
    // Lista as músicas como links para reprodução
    foreach ($musics as $music) {
        $musicName = basename($music);
        echo "<p><a href='music_player.php?music={$musicName}'>{$musicName}</a></p>";
    }
}
?>
