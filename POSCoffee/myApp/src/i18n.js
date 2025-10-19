import { createI18n } from 'vue-i18n'
import en from './locales/en.json'
import km from './locales/km.json'

const savedLocale = localStorage.getItem('locale')

const i18n = createI18n({
  legacy: false,
   locale: savedLocale || '',
  fallbackLocale: 'en',
  messages: {
    en,
    km
  }
})
window.t = (key) => i18n.global.t(key)

// ✅ make locale global (for switching anywhere)
window.setLocale = (lang) => {
  i18n.global.locale.value = lang
  localStorage.setItem('locale', lang)
}

export default i18n


