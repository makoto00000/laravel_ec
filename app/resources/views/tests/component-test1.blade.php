<x-tests.app>
  <x-slot name="header">ヘッダー1</x-slot>
  コンポーネントテスト1

  <x-tests.card title="tests title1" content="tests content" :message="$message"/>
  <x-tests.card title="tests title2" />
  <!-- 以下だけCSSを変更したい -->
  <x-tests.card title="tests title3" class="bg-red-300" />
</x-tests.app>