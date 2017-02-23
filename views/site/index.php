
<section class="home-header">
    <?=\app\widgets\BannersList::widget();?>
</section>


<section class="categories-section">
    <span class="home-header-line"><?echo \Yii::t('app', 'Найдите то, что ищете');?></span>

    <?=\app\widgets\CategoriesList::widget();?>
</section>

<section class="why-we-section">
    <div class="why-we-section-title"><?echo \Yii::t('app', 'Заголовок почему у нас');?></div>
    <div class="why-we-section-subTitle"><?echo \Yii::t('app', 'Подзаголовок почему у нас');?></div>
    <div class="why-we-section-text"><?echo \Yii::t('app', 'Текст почему у нас');?></div>
    <div class="whyWe-helper-img">
        <img src="/theme/img/whyWe-elips.png" alt="">
    </div>

    <?=\app\widgets\WhyWeList::widget();?>
</section>




