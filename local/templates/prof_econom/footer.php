<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
			</div>
		</div>
		<div id="space-for-footer"></div>
	</div>
<footer style="background: white; padding: 40px 0; border-top: 1px solid rgba(0,0,0,0.05); box-shadow: 0 -5px 15px rgba(0,0,0,0.03); width: 100%;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; flex-wrap: nowrap; justify-content: space-between; gap: 30px;">
        <!-- Логотип -->
        <div style="flex: 0 0 auto;">
            <div style="margin-bottom: 20px;">
                <a href="/" style="display: inline-block; text-decoration: none;">
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">ЭкспертЭконом</span>
                </a>
            </div>
			<!-- Нижняя часть футера -->
			<div style="max-width: 1200px; margin: 30px auto 0; padding: 20px; border-top: 1px solid rgba(0,0,0,0.05); text-align: center; color: var(--gray); font-size: 0.85rem;">
				© <?=date('Y')?> ЭкспертЭконом. Все права защищены.
			</div>
        </div>

        <!-- Меню ссылок -->
        <div style="flex: 1; min-width: 160px;">
            <h3 style="color: var(--primary); font-size: 1.1rem; margin-bottom: 15px; font-weight: 600;">Компания</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                <li><a href="/company/" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">О нас</a></li>
                <li><a href="/company/management.php" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">Команда</a></li>
                <li><a href="/company/vacancies.php" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">Вакансии</a></li>
            </ul>
        </div>

       
        <!-- Контакты -->
        <div style="flex: 1; min-width: 160px;">
            <h3 style="color: var(--primary); font-size: 1.1rem; margin-bottom: 15px; font-weight: 600;">Контакты</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; align-items:center;">
                <li style="display: flex; align-items: center; gap: 8px;">
                    <svg width="16" height="16" fill="var(--gray)" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>
                    <a href="tel:+78001234567" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">8 (800) 123-45-67</a>
                </li>
                <li style="display: flex; align-items: center; gap: 8px;">
                    <svg width="16" height="16" fill="var(--gray)" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                    <a href="mailto:info@expert-econom.ru" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">info@expert-econom.ru</a>
                </li>
            </ul>
        </div>

        <!-- Юридическая информация -->
        <div style="flex: 1; min-width: 160px;">
            <h3 style="color: var(--primary); font-size: 1.1rem; margin-bottom: 15px; font-weight: 600;">Информация</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                <li><a href="/privacy/" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">Политика конфиденциальности</a></li>
                <li><a href="/terms/" style="color: var(--gray); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--accent_blue)'" onmouseout="this.style.color='var(--gray)'">Пользовательское соглашение</a></li>
            </ul>
        </div>
    </div>

    
</footer>

<style>
    /* Адаптивность */
    @media (max-width: 768px) {
        footer > div:first-child {
            flex-direction: column;
            gap: 30px;
        }
    }
</style>
</body>
</html>