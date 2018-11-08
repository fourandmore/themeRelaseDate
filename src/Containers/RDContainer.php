    <?php
     
    namespace RD\Containers;
     
    use Plenty\Plugin\Templates\Twig;
     
    class RDContainer
    {
        public function call(Twig $twig):string
        {
            return $twig->render('RD::content.Theme');
        }
    }