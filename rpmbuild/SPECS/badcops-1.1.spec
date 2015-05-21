%define applidir /opt/application/bad/php/current/public
%define srcdir ~/BadCops/html/badcops
Name:		badcops
Version:	1.1
Release:	4
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
# rm -rf $RPM_BUILD_DIR/*
# Prepare files
mkdir -p .%{applidir} 
cp -a %{srcdir}/* .%{applidir} 
echo TEST > .%{applidir}/TEST

%build
echo "[%{name}] Building in $(pwd)"


%install
echo "[%{name}] Installing to $RPM_BUILD_ROOT"
rm -rf $RPM_BUILD_ROOT/*
ls -l .%{applidir} 

cp -af . "$RPM_BUILD_ROOT"
ls -l "$RPM_BUILD_ROOT"


%clean
ls -l "$RPM_BUILD_ROOT"
rm -rf $RPM_BUILD_DIR/*
rm -rf $RPM_BUILD_ROOT

%files
#%defattr(-,root,root,-)
#%doc
%defattr(660,bad,bad)
%{applidir}/*


%changelog
# add date with date +"%a %b %d %Y" format
* Tue May 20 2015 Gwenael Lord <glord.ext@orange.com> - 1.0-0
- ver 1.0 first build
