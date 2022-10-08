#include <iostream>
using namespace std;
int main()
{
    int s,v,i;
    cout<<"Size? ";
    cin>>s;
    int arr[s];
    for(int i=0; i<s; i++)
    {
        cin>>v;
        arr[i]=v;
    }
    for(int i=0; i<s; i++)
    {
        cout<<"Arr ["<<i<<"] = "<<arr[i]<<endl;
    }

    int nv,np;
    cout<<"New Position? ";
    cin>>np;
    s=s+1;
    i=s;
    while(i>=np)
    {
        arr[i]=arr[i-1];
        i--;
    }
    cout<<"New Value? ";
    cin>>nv;
    arr[i]=nv;
    for(int i=0; i<s; i++)
    {
        cout<<"Arr ["<<i<<"] = "<<arr[i]<<endl;
    }
    int dp;
    i=s;
    cout<<"Delete Position? ";
    cin>>dp;
    while(dp<i)
    {
        arr[dp-1]=arr[dp];
        dp++;
    }
    s=s-1;
    for(int i=0; i<s; i++)
    {
        cout<<"Arr ["<<i<<"] = "<<arr[i]<<endl;
    }

    int sv;
    cout<<"Search? ";
    cin>>sv;
    i=0;
    while(i<s)
    {
        if(arr[i]==sv)
        {
            cout<<"Arr ["<<i<<"] = "<<arr[i]<<endl;
        }
        i++;
    }
    i=0;
    int uv;
    cout<<"Update? ";
    cin>>uv;
    while(i<s)
    {
        if(arr[i]==uv)
        {
            break;
        }
        i++;
    }
    cout<<"New Value? ";
    cin>>nv;
    arr[i]=nv;
    i=0;
    for(int i=0; i<s; i++)
    {
        cout<<"Arr ["<<i<<"] = "<<arr[i]<<endl;
    }
}
