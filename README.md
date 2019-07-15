# complex dialog sample

This sample creates a complex conversation with dialogs.


## Further reading

- [Azure Bot Service](https://docs.microsoft.com/azure/bot-service/bot-service-overview-introduction?view=azure-bot-service-4.0)
- [Bot Storage](https://docs.microsoft.com/azure/bot-service/dotnet/bot-builder-dotnet-state?view=azure-bot-service-3.0&viewFallbackFrom=azure-bot-service-4.0)
o
## Deploy
```
az login
zip -r  code.zip .
az webapp deployment source config-zip --resource-group "LINE-test-resource" --name "jmatest2-bot10" --src "code.zip"
```