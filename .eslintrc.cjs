/** @type {import('eslint').ESLint.ConfigData} */
module.exports = {
  root: true,

  env: {
    browser: true,
    node: true,
    es2023: true,
  },

  extends: [
    'eslint:recommended',
    'plugin:@typescript-eslint/recommended',
    'prettier',
  ],

  parser: '@typescript-eslint/parser',
  plugins: ['@typescript-eslint', 'simple-import-sort', 'unused-imports'],

  rules: {
    'no-unused-vars': 'off',
    'no-console': 'warn',
    'react/display-name': 'off',
    'simple-import-sort/imports': 'warn',
    'simple-import-sort/exports': 'warn',
    '@typescript-eslint/no-unused-vars': 'off',
    'unused-imports/no-unused-imports': 'warn',
    'unused-imports/no-unused-vars': [
      'warn',
      {
        vars: 'all',
        varsIgnorePattern: '^_',
        args: 'after-used',
        argsIgnorePattern: '^_',
      },
    ],
  },

  globals: {
    React: true,
    JSX: true,
  },
}
