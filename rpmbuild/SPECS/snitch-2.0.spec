%define srcdir ~/BadCops/html
%define applidir /opt/application/bad/php/current/public
%define confddir /opt/application/bad/apache2215/current/conf.d

Name:		snitch
Version:	2.0
Release:	0
Summary:	A minimalist app for an automatic cloud deployement

Group:		Applications/System
License:	MIT
#URL:		
#Source: 	%{name}-%{version}-%{release}
BuildArch:	noarch
#BuildRoot              %{_buildrootdir}/%{name}-%{version}-%{release}.%{_arch}
#BuildRequires:	
Requires:	httpd >= 2.2, php54

%description
With this application, let's go for Cloud !


%prep
echo "[%{name}] Preparing $(pwd)"
# Copy php files
mkdir -p .%{applidir} 
cp -a %{srcdir}/snitch/* .%{applidir} 
# Copy vhost.conf file
mkdir -p .%{confddir} 
cp -a %{srcdir}/vhost-snitch.conf .%{confddir} 
#signature
echo %{name}-%{version}-%{release}.%{_arch} > .%{applidir}/signature


%build
echo "[%{name}] Building in $(pwd)"


%install
echo "[%{name}] Installing to $RPM_BUILD_ROOT"
rm -rf $RPM_BUILD_ROOT/*
cp -af . "$RPM_BUILD_ROOT"


%clean
rm -rf $RPM_BUILD_DIR/*
rm -rf $RPM_BUILD_ROOT

%files
%defattr(660,bad,bad)
%{applidir}/*
%attr(550, apache, apache) %{confddir}/vhost-snitch.conf

%pre
echo "[%{name}] Installing ..."
%post
service httpd restart
echo "[%{name}] Service Status Check:"
curl http://localhost/test --noproxy localhost 
exit 0

%preun
if [ "$1" = 0 ] ; then
service httpd stop
fi
exit 0
%postun
if [ "$1" = 0 ] ; then
service httpd start
fi
exit 0


%changelog
# add date with date +"%a %b %d %Y" format
* Tue May 20 2015 Gwenael Lord <glord.ext@orange.com> - 1.0-0
- ver 1.0 first build
- ver 1.2 vhost.conf included
- ver 1.3 added pre/post scripts
- ver 2.0 renamed to snitch
