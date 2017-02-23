<?php
/**
 * Created by PhpStorm.
 * User: masten
 * Date: 04.01.2017
 * Time: 17:58
 */

namespace app\common\components;

use Twig_Extension;
use Twig_Extensions_TokenParser_Trans;
use Twig_SimpleFilter;

class Twig_I18n_Extension extends Twig_Extension {

    /**
     * Translation message context
     * @var string
     */
    public $category = 'app';

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(new Twig_Extensions_TokenParser_Trans());
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('trans', array($this, 'trans')),
        );
    }


    /**
     * @param string $category the message category.
     * @param string $message the message to be translated.
     * @param array $arguments
     * @param string $language the language code (e.g. `en-US`, `en`). If this is null, the current
     * [[\yii\base\Application::language|application language]] will be used.
     * @return string
     */
    public function trans($message, array $arguments = [], $category = null, $language = null)
    {
        if (!$category) {
            $category = $this->category;
        }
        return \Yii::t($category, $message, $arguments, $language);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'i18n';
    }
}