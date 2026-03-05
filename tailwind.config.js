import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
    'neutral-secondary-soft': 'var(--color-neutral-secondary-soft)',
    'fg-brand': 'var(--color-fg-brand)',
    'fg-heading': 'var(--color-fg-heading)',
    'fg-disabled': 'var(--color-fg-disabled)',
    'border-default': 'var(--color-border-default)',
  },
  borderRadius: {
    base: '0.5rem',
  },
        },
    },

    plugins: [forms],
};
