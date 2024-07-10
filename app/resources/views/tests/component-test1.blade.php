<x-tests.app>
  <x-slot name="header">ヘッダー1</x-slot>
  コンポーネントテスト1

  <x-tests.card title="tests title1" content="tests content" :message="$message"/>
  <x-tests.card title="tests title2" />
</x-tests.app>