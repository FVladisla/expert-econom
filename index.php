<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Практико-ориентированные курсы с симуляторами реальных бизнес-процессов. • Уникальные кейсы из российской практики • Интерактивные тренажеры финансовых решений • Гибкие форматы обучения для студентов и предпринимателей • Корпоративные решения для бизнеса  Освойте прикладные навыки управления финансами предприятия в цифровом формате!");
$APPLICATION->SetTitle("ЭкспертЭконом");
?><div class="ee-wrapper">
  <!-- О компании -->
  <section class="ee-section ee-about">
    <h2 class="ee-section__title">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
      О нашей платформе
    </h2>
    <div class="ee-grid ee-grid--2col">
      <div>
        <p class="ee-about__desc"><strong>Эксперт Эконом</strong> — это современная образовательная платформа, созданная в 2025 году для профессионального обучения экономике предприятия. Мы сочетаем академические знания с практическими кейсами из российских реалий.</p>
        <ul class="ee-about__list">
          <li>5+ авторских курсов от практикующих экспертов</li>
          <li>Уникальные бизнес-симуляторы и интеграция с 1С</li>
          <li>30% контента доступно бесплатно</li>
          <li>Гибкие форматы обучения для студентов и бизнеса</li>
        </ul>
      </div>
      <div class="ee-stats">
        <h3 class="ee-stats__title">Наши достижения</h3>
        <div class="ee-stats__grid">
          <div><div class="ee-stat__val">500+</div><div class="ee-stat__label">пользователей</div></div>
          <div><div class="ee-stat__val">8%</div><div class="ee-stat__label">доля B2B-рынка</div></div>
          <div><div class="ee-stat__val">80+</div><div class="ee-stat__label">авторов курсов</div></div>
          <div><div class="ee-stat__val">2.5М</div><div class="ee-stat__label">руб. годовая выручка</div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- Продукты -->
  <section class="ee-section ee-products">
    <h2 class="ee-section__title">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
      Наши продукты
    </h2>
    <div class="ee-grid ee-grid--auto">
      <!-- B2C -->
      <div class="ee-card">
        <div class="ee-card__header ee-card__header--blue">
          <span class="ee-badge">B2C</span>
        </div>
        <div class="ee-card__body">
          <h3 class="ee-card__title">Онлайн-курсы</h3>
          <p class="ee-card__desc">Практические программы по экономике предприятия</p>
          <div class="ee-card__footer">
            <span class="ee-card__time"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 15-40 часов</span>
            <a href="/products/" class="ee-card__link">Подробнее →</a>
          </div>
        </div>
      </div>
      <!-- B2B -->
      <div class="ee-card">
        <div class="ee-card__header ee-card__header--green">
          <span class="ee-badge">B2B</span>
        </div>
        <div class="ee-card__body">
          <h3 class="ee-card__title">Корпоративные подписки</h3>
          <p class="ee-card__desc">Обучение сотрудников от 500 руб./пользователь в месяц</p>
          <div class="ee-card__footer">
            <span class="ee-card__time"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Гибкие условия</span>
            <a href="/products/" class="ee-card__link">Подробнее →</a>
          </div>
        </div>
      </div>
      <!-- P2P -->
      <div class="ee-card">
        <div class="ee-card__header ee-card__header--purple">
          <span class="ee-badge">P2P</span>
        </div>
        <div class="ee-card__body">
          <h3 class="ee-card__title">Маркетплейс курсов</h3>
          <p class="ee-card__desc">Площадка для авторов с комиссией всего 10-15%</p>
          <div class="ee-card__footer">
            <span class="ee-card__time"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Для экспертов</span>
            <a href="/products/" class="ee-card__link">Подробнее →</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Преимущества -->
  <section class="ee-section ee-advantages">
    <h2 style="margin:0 0 24px 0; text-align:center; font-size:24px; font-weight:700;">Почему выбирают нас</h2>
    <div class="ee-grid ee-grid--auto">
      <div class="ee-adv">
        <div class="ee-adv__icon" style="background:var(--ee-blue)"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
        <h3 class="ee-adv__title">Российские кейсы</h3>
        <p class="ee-adv__desc">40% больше практических примеров из российской бизнес-среды</p>
      </div>
      <div class="ee-adv">
        <div class="ee-adv__icon" style="background:var(--ee-green)"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
        <h3 class="ee-adv__title">AI-адаптация</h3>
        <p class="ee-adv__desc">Персонализированная программа обучения для каждого пользователя</p>
      </div>
      <div class="ee-adv">
        <div class="ee-adv__icon" style="background:var(--ee-purple)"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3 class="ee-adv__title">Интеграция с 1С</h3>
        <p class="ee-adv__desc">Уникальная возможность работать с реальными бизнес-данными</p>
      </div>
      <div class="ee-adv">
        <div class="ee-adv__icon" style="background:var(--ee-red)"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12" stroke="white" stroke-width="2"/><line x1="12" y1="16" x2="12.01" y2="16" stroke="white" stroke-width="2"/></svg></div>
        <h3 class="ee-adv__title">Поддержка 24/7</h3>
        <p class="ee-adv__desc">Круглосуточная техническая поддержка для всех пользователей</p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="ee-cta">
    <h2 class="ee-cta__title">Готовы начать обучение?</h2>
    <p class="ee-cta__text">Попробуйте бесплатные материалы или войдите для полного доступа</p>
    <div class="ee-cta__buttons">
      <a href="/products/" class="ee-btn ee-btn--primary">Бесплатный доступ</a>
      <a href="/login/" class="ee-btn ee-btn--outline">Войти</a>
    </div>
  </section>
</div>


<style>
    /* Адаптивность */
    @media (max-width: 768px) {
        .expert-econom-container section > div {
            grid-template-columns: 1fr !important;
        }
        
        .expert-econom-container .company-header h1 {
            font-size: 28px;
        }
        
        .expert-econom-container .cta-buttons {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>
<!-- <h3>Наша продукция</h3>
<?$APPLICATION->IncludeComponent("bitrix:furniture.catalog.index", "", array(
	"IBLOCK_TYPE" => "products",
	"IBLOCK_ID" => "2",
	"IBLOCK_BINDING" => "section",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N"
	),
	false
);?> -->

</p><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>