---
author: portals_nkjm
contributors:
  - portals_nkjm
published_at: "2021-06-30 16:03:33 +0900"
updated_at: "2021-06-30 15:55:44 +0900"
groups:
  - 01_Home
---

# ポータルズ WordPress テーマについて

# このテーマについて

このテーマは株式会社ポータルズで作成する WEB サイトにおけるポータルズオリジナルテーマです。

## 更新履歴

- 2021/06/30
  - ブロックエディタに対応
  - ブロックエディタ対応における各テンプレートファイルの見直し
  - カスタムブロックの定義
  - ブレイクポイントの変更
  - スマホ用ウィジェット削除
  - PC/SP の出し分け設定追加
  - header.php の見直し

# テーマファイルについて

## ディレクトリ構造

2021/06/30 時点でのディレクトリ構造は以下の通りです。

```
PORTALS_RESPONSIVE
│  404.php
│  archive.php
│  category.php
│  common-head.php
│  editor-style.css
│  footer.php
│  front-page.php
│  functions.php
│  header.php
│  index.php
│  mail-form-page.php
│  page-news.php
│  page-pagevoice.php
│  page.php
│  portals-page.php
│  sidebar.php
│  single.php
│  style.css
├─Blocks
├─func
├─image
│  ├─all
│  ├─page
│  ├─side
│  ├─top
│  └─voice
├─inc
├─js
│  ├─css
│  ├─images
│  ├─img
│  │  └─demopage
│  └─js
└─Templates
```

## functions.php

ポータルズテーマの全体設定ファイルです。
`func`フォルダに以下が入っています。

```
func/branch.php：デバイス別条件分岐設定
func/config.php：サイト全体の設定
func/editor.php：エディタの設定
func/form.php：コンタクトフォームの設定
func/include.php：CSS・JS読み込み設定
func/menu.php：メニューの表示設定
func/shortcode.php：ショートコードの設定
func/widgets.php：ウィジェットの設定
```

基本的に`functions.php`周りを触る事はあまりないと思いますが、万が一変更を加える際は必ずバックアップを取ってから作業してください。

## inc

各所テンプレートファイルを格納しています。
ディレクトリ構造は以下の通りです。
呼び出したいところに`<?php get_template_part('inc/hoge'); ?>`で呼び出します。

```
inc
│ contact.php
│ news.php
│ pager.php
│ related.php
│ sidemenu.php
└ voice.php
```

### contact.php

各ページ下のお問い合わせコンテンツです。

### news.php

お知らせ欄を呼び出します。
TOP ページの想定で作っていますが、タクソノミーとの併用で各下層ページにも表示させることができます。

### pager.php

ページング用の php ファイルです、特に触る事はないかと思います。

### related.php

下層ページにある【関連メニュー】のテンプレートです。
基本的には変更することがないと思いますが、スタイルの変更等でクラス名を変える場合は気をつけて変更してください。

### sidemenu.php

サイドバーの【お悩み別メニュー】【施術法メニュー】を出力するファイルです。
一覧表示させたり、タクソノミー毎に出力したりする際にこのファイルを変更します。

### voice.php

カスタム投稿タイプ【患者様の声】から、タクソノミーと連動して各ページに投稿を表示させるためのテンプレートファイルです。
【カテゴリ（声・症例）】にタームを登録して、スラッグを各ページと揃えると、指定したページに声を表示させることができます。

## Blocks

`Blocks`フォルダには、ブロックエディタの設定一式が入っています。

```
Blocks
│ output.php
│ pattern.php
│ setting.php
└─css
  ├─ style.css
  └─ common.css
```

### setting.php

ポータルズオリジナルのカスタムブロックの設定ファイルです。
ACF Pro のカスタムブロック設定と組み合わせることでオリジナルブロックを作成することができます。

### output.php

`setting.php`で定義したカスタムブロックを出力するためのファイルです。
ACF のテンプレートタグを使って出力しています。

### pattern.php

ブロックパターンの設定ファイルです。
ブロックエディタ上で作ったパターンをここに定義するとエディタから呼び出す事ができます。

### common.css

コアブロックのスタイル設定を書き換えたり、パターンのスタイル出力を制御しています。
エディタ側・フロント側どちらも、このファイルを読み込んでいます。

### style.css

カスタムブロックのスタイルを制御しています。
エディタ側・フロント側どちらも、このファイルを読み込んでいます。

#### 変数について

カスタムブロックのスタイルは基本的に色の変更のみで完了します。
色の変更は、変数を変えるだけで簡単に行う事ができます。

```css
/*
 * ベースカラーの設定
 */
:root {
  --bordercolor01: #e3e3da; /*ボーダーのカラー1つめ */
  --bordercolor02: #bdbdae; /*ボーダーのカラー2つめ */
  --bordercolor03: #79796a; /*ボーダーのカラー3つめ */
  --bgcolor01: #fff; /*背景のカラー1つめ */
  --bgcolor02: #f7f5ee; /*背景のカラー1つめ */
  --bgcolor03: #acac9d; /*背景のカラー1つめ */
  --pointcolor: #f00; /*アクセントカラー */
  --txtcolor01: #fff; /*テキストカラー1つめ */
  --txtcolor02: #333; /*テキストカラー2つめ */
}
```

適宜変数を設定しておりますが、各所で変更を加えたい場合は各々で設定してください。

# テーマ直下ファイル

WordPress テーマの基本構造に則ってファイルを構築しています。
以下には内容に気をつけたいファイルのみ説明を記載します。

## common-head.php

- 構造化マークアップ
- Google タグマネージャー
- body タグ（フォームのページ以外を右クリック禁止）

## archive.php

- ブログの月別アーカイブ
- お悩み別メニューと施術法メニューのアーカイブ

## header.php

TOP・下層・アーカイブページ等の h1・概要分（p タグ）の出力
ナビゲーション出し分け（`<nav>`内に PC と SP のナビゲーションを記述）

## portals-page.php

ディスカバリー機能を利用したページを利用する場合にこのテンプレートを選択
→ 編集画面から選択可能

## page.php・single.php

ブロックエディタで出力する場合に選択されるテンプレート。
