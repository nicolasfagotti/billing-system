<!DOCTYPE html>
<html>
<head>
		<title>{!! $title !!}</title>
		<style>
				th, td {
						padding: 3px 4px;
						vertical-align: top;
				}
        table.content {
            font-size: 0.85em;
        }
  			table.content th, table.content td {
						border: solid 0.5px black;
				}
				table.content th {
					  background-color: #f6f6f6;
						text-align: center;
				}
				table {
					  width: 100%;
    				border-spacing: 0;
    				border-collapse: collapse;
				}
		</style>
</head>
<body>
    @yield('content')
</body>
</html>
