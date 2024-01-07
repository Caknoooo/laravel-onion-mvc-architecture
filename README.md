# Laravel Onion MVC Architecture

This repository serves as a dedicated space for crafting Laravel Onion templates, adhering to the foundational principles of the Model-View-Controller (MVC) architecture. It is designed to streamline the process of creating organized and scalable web applications. The goal is to provide a focused environment that simplifies the development of well-structured projects within the Laravel framework. By offering this dedicated space, the aim is to enhance efficiency in the development process, resulting in robust and scalable web applications.

# Prerequisites

- https://classic.yarnpkg.com/lang/en/docs/install/#mac-stable
- https://getcomposer.org/

```
git clone .... OR use the template

# Install dependencies
composer install
yarn
```

### Setup configurations

```
cp .env.example .env
php artisan key:generate
php artisan migrate

php artisan serve
```

## Commit Message Convention

This website follows [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/)

Commit message will be checked using [husky and commit lint](https://theodorusclarence.com/library/husky-commitlint-prettier), you can't commit if not using the proper convention below.

### Format

`<type>(optional scope): <description>`
Example: `feat(pre-event): add speakers section`

### 1. Type

Available types are:

- feat → Changes about addition or removal of a feature. Ex: `feat: add table on landing page`, `feat: remove table from landing page`
- fix → Bug fixing, followed by the bug. Ex: `fix: illustration overflows in mobile view`
- docs → Update documentation (README.md)
- style → Updating style, and not changing any logic in the code (reorder imports, fix whitespace, remove comments)
- chore → Installing new dependencies, or bumping deps
- refactor → Changes in code, same output, but different approach
- ci → Update github workflows, husky
- test → Update testing suite, cypress files
- revert → when reverting commits
- perf → Fixing something regarding performance (deriving state, using memo, callback)
- vercel → Blank commit to trigger vercel deployment. Ex: `vercel: trigger deployment`
- trigger → Using trigger actions

### 2. Optional Scope

Labels per page Ex: `feat(pre-event): add date label`

\*If there is no scope needed, you don't need to write it

### 3. Description

Description must fully explain what is being done.

Add BREAKING CHANGE in the description if there is a significant change.

**If there are multiple changes, then commit one by one**

- After colon, there are a single space Ex: `feat: add something`
- When using `fix` type, state the issue Ex: `fix: file size limiter not working`
- Use imperative, and present tense: "change" not "changed" or "changes"
- Don't use capitals in front of the sentence
- Don't add full stop (.) at the end of the sentence

### 4. Before Commit

to clean code and setup spaces you can see `.prettierrc` for all file except php and `.editorconfig` for php.

on `.prettierrc` -> **all files**

```
{
  "semi": false,
  "singleQuote": true,
  "printWidth": 80,
  "tabWidth": 2, # change it according to your wishes
  "trailingComma": "all",
  "endOfLine": "auto"
}
```

#### Run prettier

```
yarn prettierrc
```

#### Run prettier php

on `main` directory, run:

```
./vendor/bin/pint
```

### 5. Commit Steps

```
- run -> ./vendor/bin/pint
- run -> yarn prettierrc
- git add .
- git commit -m (message commit and don't forget to precommit as specified)
- git push

```
